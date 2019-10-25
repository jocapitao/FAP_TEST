<?php

namespace App\Models\Checkout;

use Illuminate\Database\Eloquent\Model;

class CheckoutProcess extends Model
{
    protected $table = 'fap_checkout_processes';

    public $fillable = [
        'user_id', 'house_id', 'guest_nr', 'checkout_status', 'visits',
        'night_activities', 'transport', 'check_in', 'check_out', 'status', 'checkout_id',
        'rates', 'price', 'currency', 'cleaning_fee',
    ];

    public function get($checkout_id)
    {
        return $this->where('checkout_id', $checkout_id)->get()->first();
    }

    public function get_price($checkout_id)
    {
        return $this->select('price')->where('checkout_id', $checkout_id)->get()->first();
    }

    public function get_visit_price($checkout_id)
    {
        return $this->select('visits')->where('checkout_id', $checkout_id)->get()->first();
    }

    public function get_meal_price($checkout_id)
    {
        return $this->select('meals')->where('checkout_id', $checkout_id)->get()->first();
    }

    public function get_airport_pickup($checkout_id)
    {
        return $this->select('airport_transport')->where('checkout_id', $checkout_id)->get()->first();
    }

    public function get_night_price($checkout_id)
    {
        return $this->select('night_activities')->where('checkout_id', $checkout_id)->get()->first();
    }

    public function get_cleaning_price($checkout_id)
    {
        return $this->select('cleaning_fee')->where('checkout_id', $checkout_id)->get()->first();
    }

    public function get_rate($checkout_id)
    {
        return $this->select('rates')->where('checkout_id', $checkout_id)->get()->first();
    }

    public function get_currency_id($checkout_id)
    {
        return $this->select('currency')->where('checkout_id', $checkout_id)->get()->first();
    }
}
