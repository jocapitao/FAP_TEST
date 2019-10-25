<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Houses extends Model
{
    public $table = 'fap_houses';
    protected $fillable = [
        'currency_id', 'form_id',
        'user_id', 'name', 'location',
        'guest_nr', 'property_type_id',
        'stay_price_type', 'price',
        'beds', 'available_days',
        'transport_provider', 'meals',
        'night_fun', 'airport_pickup',
        'visits', 'rates', 'slug', 'commodity',
        'installations', 'rules', 'commodities', 'description', 'available_days_full', 'shared_space'
    ];

    public static function get_list($skip = 0, $take = 9, $limit = 9, $status = 1, $params)
    {
        return DB::table('fap_houses')
//		        ->join('fap_media_houses', 'fap_houses.form_id', '=', 'fap_media_houses.id_house')
            ->select('airport_pickup',
                'fap_houses.id',
                'fap_houses.form_id',
                'fap_houses.available_days',
                'fap_houses.beds',
                'fap_houses.currency_id',
                'fap_houses.guest_nr',
                'fap_houses.location',
                'fap_houses.meals',
                'fap_houses.commodities',
                'fap_houses.name',
                'fap_houses.night_fun',
                'fap_houses.price',
                'fap_houses.property_type_id',
                'fap_houses.rates',
                'fap_houses.stay_price_type',
                'fap_houses.transport_provider',
                'fap_houses.visits',
                'fap_houses.slug'
//			    'fap_media_houses.*'
            )
            ->where([
                ['status', '=', $status],

            ])
            ->whereRaw($params)
            ->limit($limit)
            ->skip($skip)
            ->take($take)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function get_host_houses($host_id)
    {
        return $this->where('user_id', $host_id)->get();
    }

    public function get_house ($house_id) {
        return $this->select('name')->where('id', $house_id)->get()->first();
    }

    public function get_price($house_id)
    {
        return $this->select('price')->where('id', $house_id)->get()->first();
    }

    public function get_visit_price($house_id)
    {
        return $this->select('visits')->where('id', $house_id)->get()->first();
    }

    public function get_meal_price($house_id)
    {
        return $this->select('meals')->where('id', $house_id)->get()->first();
    }

    public function get_airport_pickup($house_id)
    {
        return $this->select('airport_pickup')->where('id', $house_id)->get()->first();
    }

    public function get_night_price($house_id)
    {
        return $this->select('night_fun')->where('id', $house_id)->get()->first();
    }

    public function get_cleaning_price($house_id)
    {
        return $this->select('cleaning_fee')->where('id', $house_id)->get()->first();
    }

    public function get_rate($house_id)
    {
        return $this->select('rates')->where('id', $house_id)->get()->first();
    }

    public function get_currency_id ($house_id) {
        return $this->select('currency_id')->where('id', $house_id)->get()->first();
    }

    public function get_id_from_slug ($slug) {
        return $this->select('id')->where('slug', $slug)->get()->first();
    }
}
