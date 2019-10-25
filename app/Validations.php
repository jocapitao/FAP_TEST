<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Validations extends Model
{
    public static function get_language ($lang_id, $status) {
	    return \DB::table('fap_languages')
		->select('id')
		->where([
		        "id" => $lang_id,
		        "status" => $status
		])
		->get();
    }

    public static function get_currency ($currency_id,$status) {
	    return \DB::table('fap_currency')
		->select('id')
		->where([
		        "id" => $currency_id,
		        "status" => $status
		])
		->get();
    }
}
