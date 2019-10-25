<?php

namespace App\Models\House;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HouseDates extends Model
{
	public $table = 'fap_houses_dates_ranges';
	protected $fillable = ['house_id','from','to','params','status'];

	public static function get_between_dates ($from, $to) {
		return DB::table('fap_houses_dates_ranges')->distinct()
		        ->select('house_id')
		        ->where('from', '>', $from)
		        ->where('to', '<', $to)
		        ->get();
	}

	public static function get_from_date ($from) {
		return DB::table('fap_houses_dates_ranges')->distinct()
		        ->select('house_id')
		        ->where('from', '>=', $from)
		        ->get();
	}

	public static function get_to ($to) {
		return DB::table('fap_houses_dates_ranges')->distinct()
		        ->select('house_id')
		        ->where('to', '<=', $to)
		        ->get();
	}
}
