<?php

namespace App\Http\Controllers\Currency;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RatesController extends Controller
{
	public static function get_rates_post(Request $request)
	{
		return self::get_rates($request->rate);
	}

	public static function get_rates($_rate)
	{
		try {
			$list = json_decode(Storage::get('rates.json'), true);
		}
		catch (\Exception $e) {
			return [
			        'status' => false,
			        $e
			];
		}


		$compiled_data = [];

		foreach ($list['rates'] as $r => $rate) {
			$compiled_data[$r]['country'] = $rate['country'];
			$compiled_data[$r]['rate']    = $rate[$_rate];
		}

		return [
		        'status' => true,
		        'rates' => $compiled_data
		];
	}

	public static function get_rate ($rate) {
		try {
			$list = json_decode(Storage::get('rates.json'), true);
		}
		catch (\Exception $e) {
			return [
			        'status' => false,
			        $e
			];
		}

		return collect($list['rates'][$rate])->only(['country','standard_rate']);
	}

	public function get_single_rate ($rate) {
		try {
			$list = json_decode(Storage::get('rates.json'), true);
		}
		catch (\Exception $e) {
			return [
			        'status' => false,
			        $e
			];
		}

		return collect($list['rates'][$rate])->only(['country','standard_rate']);
	}
}
