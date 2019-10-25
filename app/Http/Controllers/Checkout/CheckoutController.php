<?php

namespace App\Http\Controllers\Checkout;

use Akeeba\Backup\Site\Controller\Check;
use App\Http\Controllers\Currency\CurrencyController;
use App\Http\Controllers\Currency\RatesController;
use App\Http\Controllers\User\UserAddressesController;
use App\Models\Checkout\CheckoutProcess;
use App\Models\Checkout\OrderPayments;
use App\Models\Houses;
use App\Models\User\UserAddresses;
use G2\A\C\T\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Houses\HouseController;
use Illuminate\Support\Facades\DB;
use Keygen;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    /**
     * Creates the checkout process
     */
    public static function create_checkout($checkout_data)
    {
        $checkout_process = new CheckoutProcess();

        $checkout_process->user_id           = $checkout_data['user_id'];
        $checkout_process->house_id          = $checkout_data['house_id'];
        $checkout_process->guest_nr          = $checkout_data['guests'];
        $checkout_process->checkout_status   = 1;
        $checkout_process->visits            = (isset($checkout_data['params']['visits']) ? json_encode($checkout_data['params']['visits']) : NULL);
        $checkout_process->meals             = (isset($checkout_data['params']['meals']) ? json_encode($checkout_data['params']['meals']) : NULL);
        $checkout_process->night_activities  = (isset($checkout_data['params']['night_fun']) ? json_encode($checkout_data['params']['night_fun']) : NULL);
        $checkout_process->transport         = (isset($checkout_data['params']['transport']) ? json_encode($checkout_data['params']['transport']) : NULL);
        $checkout_process->airport_transport = (isset($checkout_data['params']['airport_transport']) ? json_encode($checkout_data['params']['airport_transport']) : NULL);
        $checkout_process->checkout_id       = self::generateCode();
        $checkout_process->check_in          = $checkout_data['check_in'];
        $checkout_process->check_out         = $checkout_data['check_out'];
        $checkout_process->status            = 1;
        $checkout_process->price             = $checkout_data['vals']['price'];
        $checkout_process->rates             = $checkout_data['vals']['rates'];
        $checkout_process->currency          = $checkout_data['vals']['currency'];
        $checkout_process->cleaning_fee      = $checkout_data['vals']['cleaning_fee'];

        try {
            $checkout_process->save();
        } catch (\Exception $e) {
            return ['status' => FALSE, $e];
        }

        return $checkout_process;
    }

    public static function messages()
    {
        $messages = [
            'country.integer' => 'The country you selected is not valid.',
        ];
        return $messages;
    }

    /**
     * Saves the data to the checkout process
     */
    public static function store_data_step_1(Request $request)
    {
//		$checkout = self::get_checkout_status($request->house_id, Auth::user()->id);
////
//		if ($checkout !== NULL) {
//			return ['status' => FALSE, 'content' => ['data' => ['Already exists']]];
//		}

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255|min:1',
            'last_name'  => 'required|max:255|min:1',
            'address_1'  => 'required|max:500|min:5',
            'address_2'  => 'required_if:address_1,nullable|max:500',
            'city'       => 'required|required',
            'zip'        => 'required|required',
            'region'     => 'required|required',
            'country'    => 'required|required|integer',
            'notes'      => 'max:500',
            'house_id'   => 'required',
            //		        'tos'        => 'required',
            //		        'pp'         => 'required',
        ], self::messages());

        if ($validator->fails()) {
            return response(['status' => FALSE, 'errors' => $validator->errors()], 200);
        }

        $params = [
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'address_1'    => $request->address_1,
            'address_2'    => $request->address_2,
            'city'         => $request->city,
            'zip'          => $request->zip,
            'state_region' => $request->region,
            'country_id'   => $request->country,
        ];

        $store_user_address = UserAddressesController::create(Auth::user()->id, $params, 1);

        if ($store_user_address === NULL) {
            return ['status' => FALSE, 'content' => ['messages' => 'Error inserting.']];
        }

        $update_checkout = CheckoutProcess::where('user_id', Auth::user()->id)
            ->where('house_id', $request->house_id)
            ->update(['user_address_id' => $store_user_address]);

        if ($update_checkout === 0) {
            return ['status' => FALSE, 'error' => 'Could not update'];
        }

        return [
            'status'          => TRUE,
            'content'         => [
                'data' => ['Success!']
            ],
            'next_step'       => 2,
            'allow_next_step' => TRUE,
            'checkout_id'     => CheckoutProcess::select('checkout_id')->where('user_id', Auth::user()->id)->where('house_id', $request->house_id)->get()->first()
        ];
    }

    public static function store_data_guests(Request $request)
    {
        $checkout_id = $request->checkout_id;

        $compiled = json_encode(collect($request->all())->forget(['checkout_id', '_token']));
        $update   = CheckoutProcess::where('checkout_id', $checkout_id)->update(['guests_info' => $compiled]);

        if ($update === 0) {
            return ['status' => false, 'content' => ['message' => ['You already have a pending booking on this house.']]];
        }

        $get_house_id = CheckoutProcess::select('house_id')->where('checkout_id', $checkout_id)->get()->first();
        $get_price_id = Houses::select('currency_id')->where('id', collect($get_house_id)->get('house_id'))->get()->first();
        $get_currency = CurrencyController::get_currency(collect($get_price_id)->get('currency_id'));
        $total        = self::get_checkout_total_price($checkout_id);
        return ['status' => true, 'data' => ['message' => ['checkout_id' => $checkout_id, 'total' => $total, 'currency' => $get_currency]]];
    }

    public static function store_data_step_2($checkout_id, $paymentmethod)
    {
        //check if it doest exist a current one
        $get = OrderPayments::where('checkout_id', $checkout_id)->get()->first();

        if ($get !== NULL) {
            return ['status' => FALSE, 'content' => ['data' => ['You have a pending payment for this checkout. Go to My Reservations to find out more.']]];
        }

        $order_payments = new OrderPayments();

        $order_payments->checkout_id    = $checkout_id;
        $order_payments->payment_method = $paymentmethod;
        $order_payments->completed      = 0;

        $order_payments->save();

        return $order_payments;
    }

    public static function store_data_step_3(Request $request)
    {
        if (collect($request->payment_id)->isEmpty()) {
            //check if the payemnt atleast as a value
            return ['status' => false,'1'];
        }

        if ($request->payment_id > 3) {
            //no payment exists after the number defined above
            return ['status' => false,'1'];
        }

        $get_checkout_info = CheckoutProcess::where('checkout_id',$request->checkout_id)->get()->first();
        $house_id = collect($get_checkout_info)->get('house_id');

        DB::beginTransaction();

        //create an entry for the dados de pagamento
        $addresses      = new UserAddresses();
        $create_address = $addresses->create([
            'address_1'   => $request->address_1,
            'address_2'   => $request->address_2,
            'checkout_id' => $request->checkout_id,
            'city'        => $request->city,
            'country'     => $request->country,
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'region'      => $request->region,
            'zip'         => $request->zip,
            'house_id'         => $house_id,
        ]);

        if (collect($create_address)->isEmpty()) {
            DB::rollBack();
            return ['status' => false,'3'];
        }
        //create an entry for payment id
        $insert_payment = self::store_data_step_2($request->checkout_id, $request->payment_id);
        if (collect($insert_payment)->isEmpty()) {
            DB::rollBack();
            return ['status' => false,'4'];
        }

        $notes = $request->notes;
        $pp    = $request->notes;
        $tos   = $request->notes;

        $update_checkout = CheckoutProcess::where('checkout_id',$request->checkout_id)->update([
            'checkout_status' => 2,
            'user_address_id' => collect($create_address)->get('id'),
            'notes' => $notes,
        ]);

        if(collect($update_checkout)->isEmpty()){
            return ['status' => false];
        }

        return ['status' => true];
    }

    public static function get_data_step_1($house_id)
    {
        return $house_id;
    }

    public static function get_checkout(Request $request)
    {
        //check if checkout exists
        $checkout = self::get_checkout_status($request->house_id, Auth::user()->id);

//		if ($checkout !== NULL) {
//			return ['status' => FALSE, 'content' => ['data' => ['Already exists']]];
//		}


        if (collect($request->available_days[0])->isEmpty()) {
            $custom = [
                'user_logged'   => AuthController::get_user_status(),
                'user_currency' => [
                    'user_currency' => UserController::get_user_currency((Auth::user() ? Auth::user()->id : 0), 1)
                ],
                'js'            => [
                    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
                    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/money.js/') . '/money.min.js"></script>',
                    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/currencyFormatter.js/') . '/dist/currencyFormatter.min.js"></script>',
                ],
                'messages'      => [
                    'You have not chosen the check in and/or check out dates.'
                ]
            ];
            return view('pages.checkout.failed', $custom);
        }

        $dates             = explode(' to ', $request->available_days[0]);
        $dates             = collect($dates);
        $data['house_id']  = $request->house_id;
        $data['user_id']   = Auth::user()->id;
        $data['check_in']  = $dates->get(0);
        $data['check_out'] = $dates->get(1);
        $data['guests']    = $request->nr_guests;
        $data['params']    = self::makeDataFromRequest($request);

        $house_info = HouseController::get_house_data($data['house_id']);
        $house_info = collect($house_info);

        $data['vals'] = [
            'price'        => $house_info->get('price', NULL),
            'rates'        => $house_info->get('rates', NULL),
            'currency'     => $house_info->get('currency_id', NULL),
            'cleaning_fee' => $house_info->get('cleaning_fee', NULL)
        ];

        foreach ($data['params'] as $key => $prow) {
            if ($prow['callback'] !== FALSE) {
                $price = call_user_func($prow['callback'], $data['house_id']);
                if ($price === NULL) {
                    return ['status' => FALSE];
                }

                $data['params'][$key]['price'] = $price;
            }
        }

        //if not create
        $create = self::create_checkout($data);

        if ($create['status'] === FALSE) {
            return ['status' => FALSE, $create];
        }

        $get_checkout_total_price = self::get_checkout_total_price($create->checkout_id);

        //if yes return to my checkouts????
        return view('pages.checkout.step-1', [
            'data'          => [
                'checkout_id'   => $create->checkout_id,
                'check_in'      => $create->check_in,
                'check_out'     => $create->check_out,
                'guests'        => $create->guest_nr,
                'price'         => $create->price,
                'currency'      => $create->currency,
                'rates'         => $create->rates,
                'currency_data' => json_decode(CurrencyController::get_currency($create->currency), TRUE),
            ],
            'step_nr'       => 1,
            'user_logged'   => AuthController::get_user_status(),
            'house_id'      => $data['house_id'],
            'user_currency' => [
                'user_currency' => UserController::get_user_currency((Auth::user() ? Auth::user()->id : 0), 1)
            ],
            'css'           => [
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/jquery-loading/') . '/dist/jquery.loading.min.css"/>',
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">',
                '<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">',
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/plugins/Notice/jBox.Notice.css"/>',

            ],
            'js'            => [
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
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/money.js/') . '/money.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/currencyFormatter.js/') . '/dist/currencyFormatter.min.js"></script>',
            ]
        ]);
        //show the data
    }

    public static function get_checkout_status($house_id, $user_id, $status = 1)
    {
        $get = CheckoutProcess::select('checkout_status', 'id')
            ->where('house_id', $house_id)
            ->where('user_id', $user_id)
            ->where('status', $status)
            ->get()->first();
        return $get;
    }

    public static function get_checkout_total_price($checkout_id)
    {
        $get = CheckoutProcess::select('cleaning_fee', 'price', 'visits', 'night_activities', 'airport_transport', 'meals', 'currency', 'rates', 'guest_nr')->where('checkout_id', $checkout_id)->get()->first();
        $get = collect($get);

        $total  = 0;
        $guests = $get->get('guest_nr');

        $price  = $get->get('price');
        $visits = 0;
        if ($get->get('visits') !== NULL) {
            $visits_get = json_decode($get->get('visits'));
            $visits     = $visits_get->price;
        }

        $night_activities = 0;
        if ($get->get('night_activities') !== NULL) {
            $night_activities_get = json_decode($get->get('night_activities'));
            $night_activities     = $night_activities_get->price;
        }

        $airport_transport = 0;
        if ($get->get('airport_transport') !== NULL) {
            $airport_transport_get = json_decode($get->get('airport_transport'));
            $airport_transport     = $airport_transport_get->price;
        }

        $meals = 0;
        if ($get->get('meals') !== NULL) {
            $meals_get = json_decode($get->get('meals'));
            $meals     = $meals_get->price;
        }

        $cleaning_fee = 0;
        if ($get->get('cleaning_fee') !== NULL) {
            $cleaning_fee = $get->get('cleaning_fee');
        }

        $rates     = 1;
        $rates_get = json_decode($get->get('rates'), true);

        if (collect($rates_get)->get('rate_q') !== 'do_not_apply') {
            $get_rate_value = RatesController::get_rate(collect($rates_get)->get('rates_code'));
            $rates          = $get_rate_value['standard_rate'];
        }

        $cleaning_fee = 0;
        if ($get->get('cleaning_fee') !== NULL) {
            $cleaning_fee = $get->get('cleaning_fee');
        }

        //calc
        $total = ((($price * $guests) + (($price * $guests) * floatval("0." . intval($rates)))) + ($visits * $guests) + ($night_activities * $guests) + ($airport_transport * $guests) + ($meals * $guests) + $cleaning_fee);

        return $total;
    }

    public static function update_checkout_status($checkout_id, $user_id, $checkout_status)
    {
        $update = CheckoutProcess::where('checkout_id', $checkout_id)->where('user_id', $user_id)->update(['checkout_status' => $checkout_status]);
        return $update;
    }

    public static function remove()
    {

    }

    public static function makeDataFromRequest($request)
    {
        $return = array();

        if ($request->transport) {
            $return['transport']['status']   = TRUE;
            $return['transport']['callback'] = FALSE;
        }

        if ($request->meals) {
            $return['meals']['status']   = TRUE;
            $return['meals']['callback'] = 'App\Http\Controllers\Houses\HouseController::get_house_meals_price';
        }

        if ($request->visits) {
            $return['visits']['status']   = TRUE;
            $return['visits']['callback'] = 'App\Http\Controllers\Houses\HouseController::get_house_visit_price';
        }

        if ($request->night_fun) {
            $return['night_fun']['status']   = TRUE;
            $return['night_fun']['callback'] = 'App\Http\Controllers\Houses\HouseController::get_house_night_fun_price';
        }

        if ($request->airport_transport) {
            $return['airport_transport']['status']   = TRUE;
            $return['airport_transport']['callback'] = 'App\Http\Controllers\Houses\HouseController::get_house_airport_pickup_price';
        }

        return $return;
    }

    public static function generateCode()
    {
        return Keygen::bytes()->generate(
            function ($key) {
                $random = Keygen::numeric()->generate();
                return substr(md5($key . $random . strrev($key)), mt_rand(0, 8), 12);
            },
            function ($key) {
                return join('-', str_split($key, 4));
            },
            'strtoupper'
        );
    }

}
