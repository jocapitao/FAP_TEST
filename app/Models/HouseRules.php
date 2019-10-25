<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseRules extends Model
{
	protected $table = "fap_house_rules";

	public static function get_names($params, $wparams)
	{
		return \DB::table('fap_house_rules_names')
		        ->select($params)
		        ->where($wparams)
		        ->get()->toArray();

	}
}
