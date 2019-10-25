<?php

namespace App\Services\House;

use App\Http\Controllers\Currency\RatesController;
use App\Models\Currencies;
use App\Models\Houses;

class HouseService
{
    public function __construct()
    {
        $this->houses   = new Houses();
        $this->currency = new Currencies();
        $this->rates    = new RatesController();
    }

    /**
     * Gets all the prices and makes all calculus with everything that is price in the house
     * @param $house_id
     */
    public function get_all_house_costs_calculate($house_id)
    {

        $totals = [];

        $get_prices = collect($this->get_all_house_costs($house_id));

        //calc price
        $price = collect($get_prices)->get('price');

        //calc visit
        $visits      = collect($get_prices)->get('visit');
        $visit_price = (isset($visits['visits_price']) ? $visits['visits_price'] : null);
        //calc meal
        $meals       = collect($get_prices)->get('meal');
        $meals_price = (isset($meals['meal_price']) ? $meals['meal_price'] : null);
        //calc night fun
        $night       = collect($get_prices)->get('night_fun');
        $night_price = (isset($night['night_price']) ? $night['night_price'] : null);
        //calc airport
        $airport       = collect($get_prices)->get('airport_pickup');
        $airport_price = (isset($airport['pickup_price']) ? $airport['pickup_price'] : null);
        //calc cleaning fee
        $cleaning_fee_price = collect($get_prices)->get('cleaning_fee');
        //add the rate
        $rate     = collect($get_prices)->get('rate');
        $tax_rate = $this->rates->get_single_rate($rate['rates_code']);
        $tax_rate = $tax_rate['standard_rate'];

        #calc price
        $totals['price'] = [
            'price_clean'                   => $price['price'],
            'price_w_tax'                   => (floatval($price['price']) * (floatval("1." . intval($tax_rate)))),
            'price_w_cleaning_fee'          => (floatval($price['price']) + floatval($cleaning_fee_price)),
            'price_w_tax_plus_cleaning_fee' => ((floatval($price['price']) * (floatval("1." . intval($tax_rate)))) + floatval($cleaning_fee_price)),
            'price_cleaning_fee'            => $cleaning_fee_price,
        ];

        //activities totals
        $totals['activities'] = [
            'price_visits'         => $visit_price,
            'price_meals'          => $meals_price,
            'price_night_fun'      => $night_price,
            'price_airport_pickup' => $airport_price,
        ];

        $totals['currency'] = $this->get_house_currency_with_user_currency(collect($get_prices)->get('currency_id'));

        return $totals;

    }

    public function get_all_house_costs($house_id)
    {
        $costs = [];

        $costs['price']          = $this->houses->get_price($house_id);
        $costs['visit']          = json_decode(collect($this->houses->get_visit_price($house_id))->get('visits'), true);
        $costs['meal']           = json_decode(collect($this->houses->get_meal_price($house_id))->get('meals'), true);
        $costs['night_fun']      = json_decode(collect($this->houses->get_night_price($house_id))->get('night_fun'), true);
        $costs['airport_pickup'] = json_decode(collect($this->houses->get_airport_pickup($house_id))->get('airport_pickup'), true);
        $costs['cleaning_fee']   = json_decode(collect($this->houses->get_cleaning_price($house_id))->get('cleaning_fee'), true);
        $costs['rate']           = json_decode(collect($this->houses->get_rate($house_id))->get('rates'), true);
        $costs['currency_id']    = json_decode(collect($this->houses->get_currency_id($house_id))->get('currency_id'), true);

        return $costs;
    }

    public function get_house_currency_with_user_currency($currency_id)
    {
        $currency = $this->currency->get_currency($currency_id);
        return $currency;
    }
}