<?php

namespace App\Http\Controllers\Houses;

use App\Models\House\HouseDates;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class HouseDatesController extends Controller
{
	public static function create_between_range($house_id, $start, $end)
	{
		$house_dates = new HouseDates();

		try {
			$house_dates->house_id = $house_id;
			$house_dates->from     = $start;
			$house_dates->to       = $end;
			$insert                = $house_dates->save();
		}
		catch (\Exception $e) {
			return ['status' => FALSE, 'message' => $e];
		}

		if ($insert) {
			return ['status' => TRUE];
		}
	}

	public static function get_between_rages($start, $end)
	{
		try {
			$get = HouseDates::get('');
		} catch (\Exception $e) {
			return ['status'=>false];
		}

		return ['status' => true,'content'=>$get->first()->id];
	}

	public static function get_dates_range_format($arr)
	{
		$dates = [];
		$x     = 0;
		foreach ($arr as $key => $content) {
			$content = explode(' to ', $content);

			$dates[$x]['from'] = $content[0];
			$dates[$x]['to'] = $content[1];

			$x++;
		}

		return $dates;
	}

	public static function get_dates_range($start_date, $end_date)
	{
		$start_date = Carbon::createFromFormat('Y-m-d', $start_date);
		$end_date   = Carbon::createFromFormat('Y-m-d', $end_date);

		$dates = [];

		for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
			$dates[] = $date->format('Y-m-d');
		}

		return implode(',', $dates);
	}

	public static function update()
	{

	}

	public static function delete()
	{

	}
}
