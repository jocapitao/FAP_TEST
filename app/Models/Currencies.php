<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    protected $table = 'fap_currency';

    public function get_currency ($currency_id) {
        return $this->select('currency_name','currency_3','currency_symbol', 'id')->where('id', $currency_id)->get()->first();
    }
}
