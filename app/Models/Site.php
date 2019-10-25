<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public static function get_currencies () {
	    return \DB::table('fap_currency')
		->select('id', 'currency_name', 'currency_3')
		->where('status', 1)
		->get();
    }

    public static function get_languages () {
	    return \DB::table('fap_languages')
		->select('id', 'language_name', 'language_2')
		->where('status', 1)
		->get();
    }
}
