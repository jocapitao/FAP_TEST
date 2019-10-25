<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Properties extends Model
{
	protected $table = "fap_house_properties";

	public static function get_properties_names($status)
	{
		return \DB::table('get_house_properties_names')
		        ->where([
			    'status' => $status
		        ])
		        ->get();
	}

	public static function get_properties_of_house($house_id, $status = 1)
	{
		return DB::select('fap_house_properties.font_icon,fap_house_properties.attributes,fap_house_properties_names.`name`')
		        ->from('fap_house_properties')
		        ->join('fap_house_properties_names', 'fap_house_properties.id', '=', 'fap_house_properties_names.property_id')
		        ->where([
			    'status'                  => $status,
			    'fap_house_properties.id' => $house_id
		        ])
		        ->get();
	}
}
