<?php

namespace App\Http\Controllers\Houses;

use App\Http\Controllers\User\UserController;
use App\Models\HouseRules;
use App\Models\HouseRulesNames;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HouseRulesController extends Controller
{
	public static function get_rules()
	{
		try {
			$get = HouseRules::all();
			return $get;
		}
		catch (\Exception $e) {
			return ['status' => FALSE];
		}
	}

	public static function get_rules_names($lang)
	{
		try {
			$get = HouseRules::get_names(['name', 'rule_id', 'slug'], ['status' => 1, 'lang' => $lang]);
			return ['status' => TRUE, 'get' => $get];
		}
		catch (\Illuminate\Database\QueryException $e) {
			return ['status' => FALSE, 'e' => $e];
		}
		catch (\Exception $e) {
			return ['status' => FALSE, 'e' => $e];
		}
	}

	public static function get_rule_name($slug = NULL, $id = NULL, $lang = 1, $status = 1)
	{
		try {
			$get = NULL;
			if ($slug !== NULL) {
				$get = HouseRulesNames::select('name', 'rule_id', 'slug')
				        ->where('slug', $slug)
				        ->where('lang', $lang)
				        ->where('status', $status)
				        ->get()->first();
			}
			if ($id !== NULL) {
				$get = HouseRulesNames::select('name', 'rule_id', 'slug')
				        ->where('id', $id)
				        ->where('lang', $lang)
				        ->where('status', $status)
				        ->get()->first();
			}
		}
		catch (\Exception $e) {
			return ['status' => FALSE, 'error' => $e];
		}
		return $get;
	}
}
