<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beds extends Model
{
    protected $table = 'fap_beds';

    public static function get_bed_name ($bed_id, $lang_id) {
	    return \DB::table('fap_beds_name')
		->select('bed_name')
		->where([
		        'id' => $bed_id,
		        'lang_id' => $lang_id
		])->get();
    }
}