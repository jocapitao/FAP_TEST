<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Houses\HouseController;
use App\Http\Controllers\User\UserController;
use App\Models\Currencies;
use App\Models\PropertiesTypes;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    /**
     * @param int $page - page nr
     * @param null $stringsearch - house name
     * @param null $room - nr of rooms per house
     * @param null $guests - nr of guests that the house can hold
     * @param null $price - price
     * @param null $commodities - commodities of the house
     * @param null $property - if it has pool and stuff
     * @param null $housetype - what type is the house
     * @param null $housespacing - if it has the full house or they will be sharing them
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function get_search_index($page = 0, $stringsearch = NULL, $room = NULL, $guests = NULL, $price = NULL, $commodities = NULL, $property = NULL, $housetype = NULL, $housespacing = NULL, $stay_type = NULL, $start_date = NULL, $end_date = NULL)
    {
        $commodities_list = HouseController::get_house_properties();

        return view('pages.search.search', [
            'user_logged' => AuthController::get_user_status(),
            'user_currency' => [
                'user_currency' => UserController::get_user_currency((Auth::user() ? Auth::user()->id : 0), 1)
            ],
            'commodities_list' => $commodities_list,
            'params' => [
                'stringsearch' => $stringsearch,
                'room' => $room,
                'guests' => $guests,
                'price' => $price,
                'commodities' => $commodities,
                'property' => $property,
                'housetype' => $housetype,
                'housespacing' => $housespacing,
                'start_date' => $housespacing,
                'end_date' => $housespacing,
            ],
            'page' => $page,
            'css' => [
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/icheck/') . '/skins/flat/flat.css"/>',
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">',
            ],
            'js' => [
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
//			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/currencyFormatter.js/') . '/dist/currencyFormatter.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/money.js/') . '/money.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/currencyFormatter.js/') . '/dist/currencyFormatter.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/icheck/') . '/icheck.min.js"></script>',
                '<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>',
            ]
        ]);
    }

    public static function get_house_list_page($page = 0, $stringsearch = NULL, $room = NULL, $guests = NULL, $price = NULL, $commodities = NULL, $property = NULL, $housetype = NULL, $housespacing = NULL, $stay_type = NULL, $start_date = NULL, $end_date = NULL)
    {
        if ($price !== NULL) {
            $splited = explode('-', $price);
            $price   = $splited;
        }

        if ($stay_type !== NULL) {
            $splited = explode('-', $stay_type);

            $stay_type = [];
            foreach ($splited as $key => $values) {
//				$spa = explode('_', $values);
//				foreach ($spa as $k => $v) {
                $stay_type[$key] = $values;
//				}
            }
        }

        if ($commodities !== NULL) {
            $splited     = explode('-', $commodities);
            $commodities = $splited;
        }

        if ($housetype !== NULL) {
            $splited   = explode('-', $housetype);
            $housetype = $splited;
        }

        if ($property !== NULL) {
            $splited  = explode('-', $property);
            $property = $splited;
        }

        $params = [
            'search' => $stringsearch,
            'room' => $room,
            'guests' => $guests,
            'price' => $price,
            'commodities' => $commodities,
            'property' => $property,
            'housetype' => $housetype,
            'housespacing' => $housespacing,
            'stay_type' => $stay_type,
            'checkin' => $start_date,
            'checkout' => $end_date,
        ];

        $results = [];

        if ($page == 0) {
            $results = HouseController::get_house_list($skip = 0, 9, 9, 1, $params);
        }

        if ($page > 0) {
            $skip    = ($page * 9);
            $results = HouseController::get_house_list($skip, 9, 9, 1);
        }

        return $results;
    }

    public static function handle_params($params = [])
    {

        if (empty($params)) {
            return [FALSE];
        }

        $whereParams = '';

        if ($params['search']) {
            $whereParams .= self::handle_search_term_search($params['search']);
        }

        if ($params['guests']) {
            $whereParams .= self::handle_search_term_guests($params['guests']);
        }

        if ($params['price']) {
            $whereParams .= self::handle_price_term_search($params['price']);
        }

        if ($params['stay_type']) {
            $whereParams .= self::handle_stay_term_search($params['stay_type']);
        }

        if ($params['commodities']) {
            $whereParams .= self::handle_commodities_term_search($params['commodities']);
        }

        if ($params['housetype']) {
            $whereParams .= self::handle_house_type_term_search($params['housetype']);
        }

        if ($params['property']) {
            $whereParams .= self::handle_property_term_search($params['property']);
        }

        return $whereParams;
    }

    public static function handle_house_type_term_search($house_types)
    {

        if ($house_types[0] == 'all') {
            return ' AND property_type_id > 0';
        } else {
            $q     = ' AND ';
            $count = count($house_types);

            foreach ($house_types as $t => $k) {
                $get_id = Properties::select('id')->where(['house_commodity' => $k])->first();

                if ($t == $count - 1) {
                    $q .= ' property_type_id = ' . $get_id['id'];
                } else {
                    $q .= ' property_type_id = ' . $get_id['id'] . ' OR ';
                }
            }
            return $q;
        }
    }

    public static function handle_property_term_search($property)
    {

        if ($property[0] == 'all') {
            return ' AND installations LIKE "%%"';
        } else {
            $q     = ' AND ';
            $count = count($property);

            foreach ($property as $t => $k) {
                if ($t == $count - 1) {
                    $q .= ' installations LIKE "%' . $k . '%"';
                } else {
                    $q .= ' installations LIKE "%' . $k . '%" OR ';
                }
            }
            return $q;
        }
    }

    public static function handle_commodities_term_search($commodities)
    {

        if ($commodities[0] == 'all') {
            return ' AND commodities LIKE "%%"';
        } else {
            $q     = ' AND ';
            $count = count($commodities);

            foreach ($commodities as $t => $k) {
                if ($t == $count - 1) {
                    $q .= ' commodities LIKE "%' . $k . '%"';
                } else {
                    $q .= ' commodities LIKE "%' . $k . '%" OR ';
                }
            }
            return $q;
        }
    }

    public static function handle_stay_term_search($stay_type)
    {
        if ($stay_type[0] == 'all') {
            return ' AND stay_price_type LIKE "%%"';
        } else {
            $q     = 'AND ';
            $count = count($stay_type);

            foreach ($stay_type as $t => $k) {
                if ($t == $count - 1) {
                    $q .= ' stay_price_type = "' . $k . '"';
                } else {
                    $q .= ' stay_price_type = "' . $k . '" OR ';
                }
            }
            return $q;
        }
    }

    public static function handle_price_term_search($price)
    {
        $vals = [];
        foreach ($price as $k => $v) {
            $splitman = explode('_', $v);
            foreach ($splitman as $ka => $vall) {
                $vals[] = $vall;
            }
        }

        if ($price[0] == 'all') {
            return ' AND price > 0 ';
        } else {
            return ' AND `price` BETWEEN ' . min($vals) . ' AND ' . max($vals) . ' ';
        }
    }

    public static function handle_search_term_search($search)
    {
        if ($search == 'all') {
            return 'name LIKE "%%" ';
        } else {
            return ' LOWER(name) LIKE "%' . $search . '%" OR LOWER(location) LIKE "%' . $search . '%" ';
        }
    }

    public static function handle_search_term_room($room)
    {
//		if ($room == 'all') {
//			return 'AND guest_nr > 0 ';
//		} else {
//			return 'AND guest_nr = ' . $room . ' ';
//		}
    }

    public static function handle_search_term_guests($guests)
    {
        if ($guests == 'all') {
            return ' AND guest_nr > 0 ';
        } else {
            return ' AND guest_nr = ' . $guests . ' ';
        }
    }

    public static function handle_search_start_date($start_date)
    {
        if ($start_date === 'all') {
            return '';
        } else {
            return '';
        }
    }

    public static function handle_search_end_date($end_date)
    {

    }
}
