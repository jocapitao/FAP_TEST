<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertiesTypes extends Model
{
    protected $table = "fap_house_properties_types";

    public static function get_house_properties_names ($type_id, $lang_id,$status ) {
	return \DB::table('fap_house_properties_names')
	        ->where(['status'=>$status, 'property_id' => $type_id,  'lang_id'=>$lang_id])
	        ->first();
    }
    public static function get_house_properties_types_names ($lang_id, $type_id,$status ) {
	return \DB::table('fap_house_properties_type_names')
	        ->where(['status'=>$status, 'type_id' => $type_id,  'lang_id'=>$lang_id])
	        ->get();
    }
    public function get_house_property_type_id_by_name () {
	    return $this->hasOne('App\Models\Properties\PropertiesType', 'user_id');
    }
}
