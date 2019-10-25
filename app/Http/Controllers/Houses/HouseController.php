<?php

namespace App\Http\Controllers\Houses;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\StaticInfoController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;
use App\Models\Beds;
use App\Models\Currencies;
use App\Models\House\HouseApprovals;
use App\Models\House\HouseDates;
use App\Models\Houses;
use App\Models\Properties;
use App\Models\Properties\PropertiesNames;
use App\Models\PropertiesTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    public function __construct()
    {
        if (!\Auth::check()) {
            return redirect('/');
        }
    }

    public static function test()
    {
        return view('pages.test');
    }

    public static function get_beds($lang_id = 1, $status = 1) #get all beds
    {
        $beds = Beds::where(['status' => $status])->get()->toArray();

        $bedroom_beds       = [];
        $common_spaces_beds = [];

        foreach ($beds as $k => $bed) {
            $bed_name             = self::get_bed_name($bed['id'], $lang_id);
            $beds[$k]['bed_name'] = $bed_name['bed_name'];
        }

        foreach ($beds as $k => $bed) {
            if ($bed['location'] == 'bedroom') {
                $bedroom_beds[] = $bed;
            }

            if ($bed['location'] == 'common_spaces') {
                $common_spaces_beds[] = $bed;
            }
        }

        return [
            'bedroom_beds' => $bedroom_beds,
            'common_spaces_beds' => $common_spaces_beds,
        ];
    }

    public static function get_bed_name($bed_id, $lang_id) #get name of beds
    {
        try {
            \DB::beginTransaction();
            $get = Beds::get_bed_name($bed_id, $lang_id);
            \DB::commit();
            if ($get) {
                return ['status' => TRUE, 'bed_name' => $get[0]->bed_name];
            }
            return ['status' => FALSE];
        } catch (\Illuminate\Database\QueryException $e) {
            \DB::rollback();
            //return message
            return ['status' => FALSE, 'e' => $e];
        } catch (\Exception $e) { #error occurred
            \DB::rollback();
            //return message
            return ['status' => FALSE, 'e' => $e];
        }
    }

    public static function get_insert_house(Request $request) #get insert answer
    {
//		dd($request->all());
//		check if exists before everything
        $form_id = session('form_images')['id'];
        $check   = self::get_house_with_form_id($form_id);

        if ($check['status'] == TRUE) {
            if (!empty($check['content'])) {
                return ['status' => FALSE, 'errors' => ['This house was already inserted']];
            }
        }

        $validated_house_fields = self::validate_house_fields($request);

        if ($validated_house_fields['status'] == FALSE) {
            return ['status' => FALSE,
                'errors' => [
                    $validated_house_fields['errors'],
                ]
            ];
        }

        $content = $validated_house_fields['content'];

        //beds
        $beds           = $content['beds'];
        $beds_positions = $request->beds_division;

        foreach ($beds as $index => $bed) {
//            dd($index);
            $el_beds[] = [
                'type' => $bed,
                'room' => $beds_positions[$index + 1],
            ];
        }
        //////
        $currency         = UserController::get_user_currency(Auth::user()->id, 0);
        $property_type_id = Properties::select('id')->where([
            'house_commodity' => $content['property_type'],
            'status' => 1
        ])->get();

        $commodities   = json_encode($request->commodity);
        $installations = json_encode($request->installations);
        $rules         = json_encode($request->selectmultiple);

        $houses = new Houses();

        $slug = str_slug(rand(0, 20) . ' ' . $content['house_name']);

        //check existance of thing
        $check = self::get_house_with_slug($slug);
        if ($check['status'] == TRUE) {
            if (count($check['content']) > 0) {
                if (!empty($check['content'])) {
                    return ['status' => FALSE, 'errors' => ['This house is already taken. Try changing the name.']];
                }
            }
        }

        DB::beginTransaction();
        try {
            $insert = $houses->create([
                'currency_id' => $currency['currency']['id'],
                'form_id' => $form_id,
                'user_id' => Auth::user()->id,
                'name' => $content['house_name'],
                'location' => $content['house_location'],
                'guest_nr' => $content['guest_nr'],
                'description' => $request->description,
                'property_type_id' => $property_type_id[0]->id,
                'stay_price_type' => $content['price_to_apply_input'],
                'price' => $content['stay_price'],
                'beds' => json_encode($el_beds),
                'available_days' => $content['available_days'],
                'available_days_full' => NULL,
                'transport_provider' => ($content['transport_provider'] == 'on' ? 1 : 0),
                'meals' => json_encode($content['meals']),
                'night_fun' => json_encode($content['night']),
                'airport_pickup' => json_encode($content['pickup']),
                'visits' => json_encode($content['visits']),
                'rates' => json_encode($content['rate']),
                'slug' => $slug,
                'commodities' => $commodities,
                'installations' => $installations,
                'rules' => $rules,
                'shared_space' => ($request->sharedspace === 'on' ? 1 : 0),
                'cleaning_fee' => $request->cleaning_fee,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return ['status' => FALSE, 'e' => $e];
        }

        DB::commit();

//		dd($insert);

        if ($insert->id) {
            $messages = [];

            //insert dates
            $complete_dates = HouseDatesController::get_dates_range_format($request->available_days);
            foreach ($complete_dates as $key => $dates) {
                $insert_dates = HouseDatesController::create_between_range($insert->id, $dates['from'], $dates['to']);
                if ($insert_dates['status'] === FALSE) {
                    $messages[] = 'Failed inserting ' . $insert_dates['message'];
                }
            }
            //insert request to approve
            $makeApprove = self::makeHouseApproveRequest($insert->id);

            if ($makeApprove['status'] == TRUE) {
                return ['status' => TRUE, 'Inserted with success'];
            }

            return ['status' => FALSE, 'messages' => [$messages]];
        }
        return ['status' => FALSE];
    }

    public static function get_house_index($slug)
    {
        return view('pages.house.house', [
            'user_logged' => AuthController::get_user_status(),
            'slug' => $slug,
            'user_currency' => [
                'user_currency' => UserController::get_user_currency((Auth::user() ? Auth::user()->id : 0), 1)
            ],
            'css' => [
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/jquery-loading/') . '/dist/jquery.loading.min.css"/>',
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">',
                '<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">',
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/plugins/Notice/jBox.Notice.css"/>',
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/raty/') . '/lib/jquery.raty.css"/>',
            ],
            'js' => [
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/money.js/') . '/money.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/currencyFormatter.js/') . '/dist/currencyFormatter.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jquery-loading/') . '/dist/jquery.loading.min.js"></script>',
                '<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>',
                '<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>',
                '<script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/jBox.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/plugins/Notice/jBox.Notice.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/raty/') . '/lib/jquery.raty.js"></script>',
            ]
        ]);
    }

    public static function get_house(Request $request)
    {
        //get house data
        $data = self::get_house_with_slug($request->slug);
//		dd($data);

        //get house info
        $info = self::get_house_info(json_decode(json_encode($data['content']), FALSE), 1);
//		dd($info);
        $images                  = HouseMediaController::get_images_bulk(['form_id' => $data['content'][0]['form_id']], 1, 1);
        $house_dates             = self::get_house_dates(0, $info[0]->available_days);
        $info[0]->formated_dates = $house_dates;

        if ($images) {
            $info[0]->images = $images;
        }

        if (!collect($info)->isEmpty()) {
            return ['status' => TRUE, 'content' => $info[0]];
        }
        return ['status' => FALSE, 'content' => 'Unkown Error!'];
    }

    public static function get_house_dates($house_id = 0, $data = '')
    {
        if ($house_id !== 0) {
            //get data
        }

        $dates          = json_decode($data, TRUE);
        $formated_dates = [];
        $current        = 0;
        foreach ($dates as $key => $ds) {
            $jihad                            = explode(' to ', $ds);
            $formated_dates[$current]['from'] = $jihad[0];
            $formated_dates[$current]['to']   = $jihad[1];
            $current++;
        }

        return json_encode($formated_dates);
    }

    public static function get_house_properties_names($lang = 1, $property_id, $status = 1)
    {
        try {
            $get =
                PropertiesTypes::get_house_properties_names($lang, $property_id, $status);
            return $get;
        } catch (\Illuminate\Database\QueryException $e) {
            \DB::rollback();
            //return message
            return ['status' => FALSE, 'e' => $e];
        } catch (\Exception $e) { #error occurred
            \DB::rollback();
            //return message
            return ['status' => FALSE, 'e' => $e];
        }
    }

    public static function get_house_properties_types_names($lang = 1, $type_id = 0, $status = 1)
    {
        try {
            $get =
                PropertiesTypes::get_house_properties_types_names($lang, $type_id, $status)->first();
            return $get;
        } catch (\Illuminate\Database\QueryException $e) {
            \DB::rollback();
            //return message
            return ['status' => FALSE, 'e' => $e];
        } catch (\Exception $e) { #error occurred
            \DB::rollback();
            //return message
            return ['status' => FALSE, 'e' => $e];
        }
    }

    public static function get_properties($type_id = NULL, $status = 1)
    {
        try {
            if ($type_id != NULL) {
                $get_properties = Properties::where(['status' => $status])->get();
            } else {
                $get_properties =
                    Properties::where(['status' => $status, 'type_id' => $type_id])->get();
            }

            return $get_properties;
        } catch (\Illuminate\Database\QueryException $e) {
            \DB::rollback();
            //return message
            return ['status' => FALSE, 'e' => $e];
        } catch (\Exception $e) { #error occurred
            \DB::rollback();
            //return message
            return ['status' => FALSE, 'e' => $e];
        }
    }

    public static function get_house_properties($status = 1)
    {
        try {
            $get_properties_types = PropertiesTypes::where([
                'status' => $status
            ])->get();

            $get_properties_types_names = self::get_house_properties_types_names();

            $get_properties = Properties::where(['status' => $status])->get();
        } catch (\Illuminate\Database\QueryException $e) {
            \DB::rollback();
            //return message
            return ['status' => FALSE, 'e' => $e];
        } catch (\Exception $e) { #error occurred
            \DB::rollback();
            //return message
            return ['status' => FALSE, 'e' => $e];
        }

//		$userlang =
//		        CurrencyLang::select('language_id')->where(['user_id' => \Auth::user()->id])->first();
        $ans = [];

        foreach ($get_properties_types as $t => $types) {
            $ans[$types->id] = [
                'property_type' => [
                    'idt' => $types->property_type,
                    'id' => $types->id,
                    'name' => (isset(self::get_house_properties_types_names(1/*$userlang->language_id*/, $types->id)->name) ? self::get_house_properties_types_names(1/*$userlang->language_id*/, $types->id)->name : $types->property_type),
                    'type' => $types->type,
                    'icon' => $types->icon,

                ],
                'commodities' => []
            ];
        }

        foreach ($get_properties as $c => $commodity) {
            $get_commodity_name                                                   = self::get_house_properties_names(1/*$userlang->language_id*/, $commodity->id);
            $ans[$commodity->type_id]['commodities'][$commodity->house_commodity] = $get_commodity_name;
        }

        $i = 0;
        foreach ($ans as $a => $an) {
            foreach ($an['commodities'] as $commo => $commodity) {
                $name_id =
                    Properties::select(['id', 'font_icon'])->where(['house_commodity' => $commo])->first();
                $name    =
                    PropertiesNames::select(['name'])->where(['lang_id' => 1, 'property_id' => $name_id->id])->first();

                $ans[$a]['commodities'][$commo]['name'] = $name['name'];
//				$ans[$a]['commodities'][$commo] = $name['name'];
                $ans[$a]['commodities'][$commo]['icon'] = $name_id->font_icon;
            }
        }

        return $ans;
    }

    public static function get_house_visit_price($house_id)
    {
        $get  = Houses::select('visits')->where('id', $house_id)->get()->first();
        $data = json_decode($get['visits']);
        if (isset($data->visits_price)) {
            return $data->visits_price;
        }

        return null;
    }

    public static function get_house_meals_price($house_id)
    {
        $get  = Houses::select('meals')->where('id', $house_id)->get()->first();
        $data = json_decode($get['meals']);
        if (isset($data->meal_price)) {
            return $data->meal_price;
        }

        return null;
    }

    public static function get_house_night_fun_price($house_id)
    {
        $get  = Houses::select('night_fun')->where('id', $house_id)->get()->first();
        $data = json_decode($get['night_fun']);
        if (isset($data->night_price)) {
            return $data->night_price;
        }

        return null;
    }

    public static function get_house_airport_pickup_price($house_id)
    {
        $get  = Houses::select('airport_pickup')->where('id', $house_id)->get()->first();
        $data = json_decode($get['airport_pickup']);
        if (isset($data->pickup_price)) {
            return $data->pickup_price;
        }

        return null;
    }

    /**
     * Searches houses by the form id to know if unique insert or not / if it's only inserted one
     * instace of a house while the form is submited
     *
     * @param $formid
     *
     * @return array
     */
    public static function get_house_with_form_id($formid)
    {
        try {
            $get = Houses::where(['form_id' => $formid])->get()->toArray();
        } catch (\Exception $e) {
            return ['status' => FALSE, 'e' => $e];
        }

        return ['status' => TRUE, 'content' => $get];
    }

    /**
     * Searchs for a house by its slug and retrieves all information
     *
     * @param     $slug
     * @param int $public
     *
     * @return array
     */
    public static function get_house_with_slug($slug, $public = 0)
    {
        try {
            $get = Houses::where(['slug' => $slug])->get()->toArray();
        } catch (\Exception $e) {
            return ['status' => FALSE, 'e' => $e];
        }

        return ['status' => TRUE, 'content' => $get];
    }

    public static function get_house_info($data, $public = 0)
    {
//		return $data;
        foreach ($data as $index => $house) {
            //property type id

            //get icon first because the id changes to the name
            // on stand by cuz i dont know how usefull is to get the house type icon
//			$data[$index]->property_type_icon = Properties::select('font_icon')->where(['id' => $house->property_type_id])->get()->first();
            $data[$index]->property_type_id = PropertiesNames::select('name')->where(['property_id' => $house->property_type_id])->get()->toArray()[0]['name'];

            //stay price night name
            if ($house->stay_price_type == "price_night") {
                $name_price = __('host.price_to_apply_input_night');
            } elseif ($house->stay_price_type == "price_weekend") {
                $name_price = __('host.price_to_apply_input_weekend');
            } elseif ($house->stay_price_type == "price_week") {
                $name_price = __('host.price_to_apply_input_week');
            } elseif ($house->stay_price_type == "price_month") {
                $name_price = __('host.price_to_apply_input_month');
            }
            $data[$index]->stay_price_type = $name_price;

            //transport provider
            if ($house->transport_provider == 1) {
                $transport = __('host.will_provide_trans');
            } else {
                $transport = __('host.will_not_provide_trans');
            }
            $data[$index]->transport_provider = ['text' => $transport, 'val' => $house->transport_provider];

            //currency
            $data[$index]->currency = Currencies::where(['id' => $house->currency_id])->get()->first()->toArray();
//			dd($data[$index]->currency);
            //TODO
            //rates
            //airport pickup
            //visits
            //night fun
            //commodities

            $attributes               = self::get_house_attributes($data[$index]->id);
            $data[$index]->attributes = $attributes;

//			dd($data[$index]->attributes);
            //property_type
            //installations

            if ($public == 1) {
//				unset($data[$index]->id);
//				unset($data[$index]->form_id);
            }
        }

        return $data;
    }

    public static function get_house_data($house_id)
    {
        $get = Houses::where('id', $house_id)->get()->first();
        return $get;
    }

    public static function get_house_attributes($house_id, $langid = 1, $status = 1)
    {
        $get_commodities = Houses::select('commodities')->where([
            'id' => $house_id,
            'status' => 1
        ])->get()->first();
//		dd($get_commodities);

        $formated = [];

        if (!empty($get_commodities)) {
            $commodities = json_decode($get_commodities['commodities'], TRUE);

            foreach ($commodities as $key => $commodity) {
                try {
                    $formated['commodities'][$commodity]['data'] = Properties::where([
                        'house_commodity' => $commodity,
                        'status' => $status
                    ])->get()->first()->toArray();
                    $formated['commodities'][$commodity]['info'] = PropertiesNames::where([
                        'id' => $formated['commodities'][$commodity]['data']['id'],
                        'status' => $status
                    ])->get()->first()->toArray();
                } catch (\Exception $e) {
//					dd($e);
                    continue;
                }
            }
        }

        $get_installations = Houses::select('installations')->where([
            'id' => $house_id,
            'status' => 1
        ])->get()->first();

        if (!empty($get_installations)) {
            $installations = json_decode($get_installations['installations'], TRUE);
            foreach ($installations as $key => $commodity) {
                try {
                    $formated['installations'][$commodity]['data'] = Properties::where([
                        'house_commodity' => $commodity,
                        'status' => $status
                    ])->get()->first();
                    $formated['installations'][$commodity]['info'] = PropertiesNames::where([
                        'property_id' => $formated['installations'][$commodity]['data']['id'],
                        'lang_id' => $langid
                    ])->get()->first()->toArray();
                } catch (\Exception $e) {
                    continue;
                }
            }
        }

        return $formated;
    }

    public static function get_house_list($skip = 0, $take = 9, $limit = 9, $format = 0, $params = [])
    {
        $houses_id = [];
//		dd($params);

        if ($params['checkin'] !== 'all' || $params['checkout'] !== 'all') {
            if ($params['checkin'] !== NULL && $params['checkout'] !== NULL) {
                $houses_id = HouseDates::get_between_dates($params['checkin'], $params['checkout']);
            } elseif ($params['checkin'] !== 'all' && $params['checkout'] === 'all') {
                $houses_id = HouseDates::get_from_date($params['checkin'], $params['checkout']);
            } elseif ($params['checkin'] === 'all' && $params['checkout'] !== 'all') {
                $houses_id = HouseDates::get_to($params['checkin'], $params['checkout']);
            }
        }

//		if(collect($houses_id)->isNotEmpty()){
////			$houses =
//			foreach($houses_id as $key => $house){
//
//			}
//		}

        $toQueryWhere = SearchController::handle_params($params);

        try {
            $get = Houses::get_list($skip, $take, $limit, 1, $toQueryWhere); //if nothing set gets the first 9
        } catch (\Exception $e) {
            return ['status' => FALSE, 'e' => $e];
        }

        if ($get) {
            //attatch images to the houses
            $get = HouseMediaController::get_images_bulk($get);

            if ($format == 1) {
                $formated = self::get_house_info($get);

                return ['status' => TRUE, 'content' => $formated, 'houses' => $houses_id];
            }

            return ['status' => TRUE, 'content' => $get, 'houses' => $houses_id];
        }

    }

    public static function get_house_property_properties(Request $request)
    {
        if ($request->division) {
            try {
                $divion_properties = Properties::select(['properties'])->where(['house_commodity' => $request->division])->get()->first();
            } catch (\Exception $e) {
                return ['status' => FALSE];
            }
            return ['status' => TRUE, 'content' => json_decode($divion_properties['properties'], TRUE)];
        }

        return ['status' => FALSE];
    }

    public static function get_house_rules($house_slug = NULL, $house_id = 0, $status = 1)
    {
        if ($house_id === 0) {
            $get_house_id = Houses::select('id')->where('slug', $house_slug)->firstOrFail();
            $house_id     = $get_house_id->id;
            //			return ['status' => false];
        }

        try {
            $get_house_rules = Houses::select('rules')
                ->where('status', $status)
                ->where('id', $house_id)
                ->get()->first();
        } catch (\Exception $e) {
            return ['status' => FALSE, 'error' => $e];
        }
        $rules_ = json_decode($get_house_rules['rules']);
        $rules  = [];
        $lang   = 1;

        if (Auth::user()) {
            $lang = Auth::user()->language;
        }

        foreach ($rules_ as $slug) {
            $get = HouseRulesController::get_rule_name($slug, NULL, $lang);
            if ($get === NULL) {
                return ['status' => FALSE, 'error' => NULL];
            }

            $rules[] = $get;
        }

        return ['status' => true, 'content' => ['data' => ['rules' => $rules]]];
    }

    public static function get_house_rates($house_id)
    {

    }

    public static function validate_house_fields($fields)
    {
//		var_dump($fields->all());
        $customErrors = [];
        $toReturn     = [];

        $validator = \Validator::make([
            'house_name' => $fields->house_name,
            'house_location' => $fields->house_location,
            'description' => $fields->description,
            'guest_nr' => $fields->guest_nr,
            'property_type' => $fields->property_type,
            'price_to_apply_input' => $fields->price_to_apply_input,
            'stay_price' => $fields->stay_price,
            'beds' => $fields->beds,
            'available_days' => $fields->available_days,
        ], [
            'house_name' => 'required|string',
            'house_location' => 'required|string',
            'description' => 'required|string',
            'guest_nr' => 'required|integer',
            'property_type' => 'required',
            'price_to_apply_input' => 'required',
            'stay_price' => 'required',
            'beds' => 'required',
            'available_days' => 'required',
        ]);

        if ($validator->fails()) {
            $customErrors = $validator->errors()->messages();
        }

        $toReturn = [
            'house_name' => $fields->house_name,
            'house_location' => $fields->house_location,
            'guest_nr' => $fields->guest_nr,
            'property_type' => $fields->property_type,
            'price_to_apply_input' => $fields->price_to_apply_input,
            'stay_price' => StaticInfoController::cleanPrice($fields->stay_price),
            'beds' => $fields->beds,
            'available_days' => json_encode($fields->available_days),
        ];

        ////////////////
        if (isset($fields->transport_provider)) {
            $toReturn['transport_provider'] = $fields->transport_provider;
        } else {
            $toReturn['transport_provider'] = FALSE;
        }

        if (isset($fields->description)) {
            $toReturn['description'] = $fields->description;
        } else {
            $toReturn['description'] = FALSE;
        }

        ////////////////
        $meals_q     = $fields->meals;
        $meals_qp    = $fields->meals_price_question;
        $meals_price = $fields->meal_price;
        if (isset($meals_q) && isset($meals_qp)) {
            $toReturn['meals']['meal_q']  = $meals_q;
            $toReturn['meals']['meal_pq'] = $meals_qp;
            if (empty($meals_price)) {
                $customErrors['meal_price'] = 'Meal price is not set.';
            }
            if (!empty($meals_price)) {
                $mprice                          = StaticInfoController::cleanPrice($meals_price);
                $toReturn['meals']['meal_price'] = $mprice;
                $toReturn['meals']['meal_q']     = $meals_q;
                $toReturn['meals']['meal_pq']    = $meals_qp;
            }
        } elseif (isset($meals_q) && !isset($meals_qp)) {
            $toReturn['meals']['meals_q']  = $meals_q;
            $toReturn['meals']['meals_qp'] = FALSE;
        } elseif (!isset($meals_q)) {
            $toReturn['meals']['meals_q'] = FALSE;
        }

        ////////////////
        $visits_q     = $fields->visit_around_city;
        $visits_qp    = $fields->guest_visit_price_question;
        $visits_price = $fields->guest_visit_price;

        if (isset($visits_q) && isset($visits_qp)) {
            $vprice                          = StaticInfoController::cleanPrice($visits_price);
            $toReturn['visits']['visits_q']  = $visits_q;
            $toReturn['visits']['visits_pq'] = $visits_qp;
            if (empty($visits_price)) {
                $customErrors['visits_price'] = 'Visits price is not set.';
            }
            if (!empty($visits_price)) {
                $toReturn['visits']['visits_price'] = $vprice;
            }
        } elseif (isset($visits_q) && !isset($visit_qp)) {
            $toReturn['visits']['visits_q']  = $meals_q;
            $toReturn['visits']['visits_qp'] = FALSE;
        } elseif (!isset($visits_q)) {
            $toReturn['visits']['visits_q'] = FALSE;
        }

        ////////////////
        $night_q     = $fields->night_fun;
        $night_qp    = $fields->night_fun_price_question;
        $night_price = $fields->night_fun_price;

        if (isset($night_q) && isset($night_qp)) {
            $nprice = StaticInfoController::cleanPrice($night_price);

            $toReturn['night']['night_q']  = $night_q;
            $toReturn['night']['night_pq'] = $night_qp;
            if (empty($night_price)) {
                $customErrors['night_price'] = 'Night fun price is not set.';
            }
            if (!empty($night_price)) {
                $toReturn['night']['night_price'] = $nprice;
            }
        } elseif (isset($night_q) && !isset($night_qp)) {
            $toReturn['night']['night_q']  = $night_q;
            $toReturn['night']['night_qp'] = FALSE;
        } elseif (!isset($night_q)) {
            $toReturn['night']['night_q'] = FALSE;
        }

        ////////////////
        $pickup_q     = $fields->guest_pickup;
        $pickup_qp    = $fields->guest_pickup_price_question;
        $pickup_price = $fields->guest_pickup_price;

        if (isset($pickup_q) && isset($pickup_qp)) {
            $pprice                          = StaticInfoController::cleanPrice($pickup_price);
            $toReturn['pickup']['pickup_q']  = $pickup_q;
            $toReturn['pickup']['pickup_pq'] = $pickup_qp;
            if (empty($pickup_price)) {
                $customErrors['pickup_price'] = 'Pickup price is not set.';
            }
            if (!empty($pickup_price)) {
                $toReturn['pickup']['pickup_price'] = $pprice;
            }
        } elseif (isset($pickup_q) && !isset($pickup_qp)) {
            $toReturn['pickup']['pickup_q']  = $pickup_q;
            $toReturn['pickup']['pickup_qp'] = FALSE;
        } elseif (!isset($pickup_q)) {
            $toReturn['pickup']['pickup_q'] = FALSE;
        }

        ///////////////
        if (isset($fields->rate)) {
            $toReturn['rate']['rate_q'] = $fields->rate;

            if (empty($fields->rates_code) && $fields->rate != 'do_not_apply') {
                $customErrors['rate']['rates_code'] = 'VAT rate are not set.';
            }
            if (!empty($fields->rates_code)) {
                $toReturn['rate']['rates_code'] = $fields->rates_code;
            }
        } elseif (isset($fields->rate)) {
            $toReturn['rate']['rate_q'] = $fields->rate;
        }

        if (!empty($customErrors)) {
            return ['status' => FALSE, 'errors' => $customErrors];
        }

        return ['status' => TRUE, 'content' => $toReturn];
    }

    public static function makeHouseApproveRequest($house_id, $house_status = 0, $user_approval_id = NULL)
    {
        try {
            $create = HouseApprovals::create([
                'id_house' => $house_id,
                'house_status' => $house_status,
                '$house_status' => $user_approval_id
            ]);
        } catch (\Exception $e) {
            return ['status' => FALSE, 'e' => $e];
        }

        if ($create->id) {
            return ['status' => TRUE];
        }

        return ['status' => FALSE, 'e' => 'Unknown'];
    }
}
