<?php

namespace App\Models\Checkout;

use Illuminate\Database\Eloquent\Model;

class OrderPayments extends Model
{
    protected $table = 'fap_orders_payments';
    public $fillable = [
      'order_id','checkout_id','payment_method','completed'
    ];

    public function get_method ($checkout_id) {
        return $this->where('checkout_id',$checkout_id)->get()->first();
    }
}
