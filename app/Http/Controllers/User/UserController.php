<?php

namespace App\Http\Controllers\User;

use App\Models\User\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Currencies;
use App\Models\Languages;
use App\Models\User\CurrencyLang;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

	public static function get_userid_by_email($useremail, $status = 1)
	{
		try {
			\DB::beginTransaction();
			$get_userid_by_email = UserModel::get_userid_by_email($useremail, $status);
			\DB::commit();

			if (!empty($get_userid_by_email)) {
				return ["status" => true, "userid" => $get_userid_by_email[0]->id];
			}
			return ['status' => false];
		}
		catch (\Illuminate\Database\QueryException $e) {
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
		catch (\Exception $e) { #error occurred
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
	}

	public static function get_userid_by_username($username)
	{
		try {
			\DB::beginTransaction();
			$get_userid_by_username = UserModel::get_userid_by_username($username);
			\DB::commit();

			if (count($get_userid_by_username) > 0) {
				return ["status" => true, "userid" => $get_userid_by_username[0]->id];
			}
			return ['status' => false];
		}
		catch (\Illuminate\Database\QueryException $e) {
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
		catch (\Exception $e) { #error occurred
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
		return ['status' => false];
	}

	public static function get_user_profile_info($userid, $status = 1)
	{
		try {
			\DB::beginTransaction();
			$get_user_profile_info = UserModel::get_user_profile_info($userid, $status);
			\DB::commit();

			if (count($get_user_profile_info) > 0) {
				return [
				        'status'  => true,
				        'profile' => 1, 'profile_info' => $get_user_profile_info[0]
				];
			}
			return ['status' => true, 'profile' => 0];
		}
		catch (\Illuminate\Database\QueryException $e) {
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
		catch (\Exception $e) { #error occurred
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}


	}

	public static function get_user_names($userid, $status = 1)
	{
		try {
			\DB::beginTransaction();
			$get_user_names = UserModel::get_user_names($userid, $status);
			\DB::commit();

			if (count($get_user_names) > 0) {
				return ['status' => true, 'profile' => 1, 'user_names' => $get_user_names[0]];
			}
			return ['status' => true, 'profile' => 0];
		}
		catch (\Illuminate\Database\QueryException $e) {
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
		catch (\Exception $e) { #error occurred
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}


	}

	public static function get_user_description($userid, $status = 1)
	{
		try {
			\DB::beginTransaction();
			$get_user_description = UserModel::get_user_description($userid, $status);
			\DB::commit();

			if (count($get_user_description) > 0) {
				return ['status'      => true,
				        'description' => $get_user_description[0]->description
				];
			}
			return ['status' => true, 'profile' => 0];
		}
		catch (\Illuminate\Database\QueryException $e) {
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
		catch (\Exception $e) { #error occurred
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
	}

	public static function get_user_language($user_id)
	{
		$language_n = 'N/A';
		$language_2 = 'N/A';

		$user_language = CurrencyLang::select('language_id')->where(['user_id' => $user_id])
		        ->get()->toArray();

		if ($user_language[0]) {
			$getlanguage =
			        Languages::select(['id', 'language_name', 'language_2'])->where(['id' => $user_language[0]['language_id'], 'status' => 1])->get()->toArray();;

			if (!empty($getlanguage)) {
				$language_n  = $getlanguage[0]['language_name'];
				$language_2  = $getlanguage[0]['language_2'];
				$language_id = $getlanguage[0]['id'];

				return [
				        'status'   => true,
				        'language' => [
					    'name'   => $language_n,
					    'name_2' => $language_2,
					    'id'     => $language_id
				        ]
				];
			}

			return [
			        'status'   => false,
			        'language' => [
				    'name'   => 'Error',
				    'name_2' => 'Error'
			        ]
			];

		}

		return [
		        'status'   => false,
		        'language' => [
			    'name'   => 'Error',
			    'name_2' => 'Error'
		        ]
		];
	}

	public static function get_user_currency($user_id = 0, $public = 0)
	{
		$currency_n = 'N/A';
		$currency_3 = 'N/A';


		if ($user_id == 0) {
			if (!session('guest_currency')) {
				$getcurrency = Currencies::select(['id', 'currency_name', 'currency_3', 'currency_symbol'])->where(['id' => 1, 'status' => 1])->get()->first()->toArray();
				session(['guest_currency' => [
				        'currency_id'     => $getcurrency['id'],
				        'currency_name'   => $getcurrency['currency_name'],
				        'currency_3'      => $getcurrency['currency_3'],
				        'currency_symbol' => $getcurrency['currency_symbol']
				]]);
			}

			if ($public == 1) {
				return [
				        'status'   => true,
				        'currency' => [
					    'name'   => session('guest_currency')['currency_name'],
					    'name_3' => session('guest_currency')['currency_3'],
					    'name_s' => session('guest_currency')['currency_symbol']
				        ]
				];
			}

			return [
			        'status'   => true,
			        'currency' => [
				    'id'     => session('guest_currency')['id'],
				    'name'   => session('guest_currency')['currency_name'],
				    'name_3' => session('guest_currency')['currency_3'],
				    'name_s' => session('guest_currency')['currency_symbol']
			        ]
			];
			//get euro
			//set session var
			//return session var
		} else {
			$user_currency = CurrencyLang::select('currency_id')->where(['user_id' => $user_id])
			        ->get()->toArray();

			if(!isset($user_currency[0])){
				$insert = AccountSettingsController::insert_user_currency_lang($user_id);
				if($insert['status'] == false){
					return [
					        'status'   => false,
					        'currency' => [
						    'name'   => 'Error',
						    'name_3' => 'Error',
						    'name_s' => 'Error'
					        ]
					];
				}
				$user_currency = CurrencyLang::select('currency_id')->where(['user_id' => $user_id])
				        ->get()->toArray();
			}

			if (isset($user_currency[0])) {
				$getcurrency = Currencies::select(['id', 'currency_name', 'currency_3', 'currency_symbol'])->where(['id' => $user_currency[0]['currency_id'], 'status' => 1])->get()->toArray();

				if (!empty($getcurrency)) {
					$currency_id = $getcurrency[0]['id'];
					$currency_n  = $getcurrency[0]['currency_name'];
					$currency_3  = $getcurrency[0]['currency_3'];
					$currency_s  = $getcurrency[0]['currency_symbol'];

					if ($public == 1) {
						return [
						        'status'   => true,
						        'currency' => [
							    'name'   => $currency_n,
							    'name_3' => $currency_3,
							    'name_s' => $currency_s
						        ]
						];
					}
					return [
					        'status'   => true,
					        'currency' => [
						    'id'     => $currency_id,
						    'name'   => $currency_n,
						    'name_3' => $currency_3,
						    'name_s' => $currency_s
					        ]
					];
				}
				return [
				        'status'   => false,
				        'currency' => [
					    'id'     => 'Error',
					    'name'   => 'Error',
					    'name_3' => 'Error',
					    'name_s' => 'Error'
				        ]
				];
			}
		}

		return [
		        'status'   => false,
		        'currency' => [
			    'name'   => 'Error',
			    'name_3' => 'Error',
			    'name_s' => 'Error'
		        ]
		];
	}

	public static function insert_user_names($names, $userid, $status = 1)
	{
		try {
			\DB::beginTransaction();
			$insert = UserModel::insert_user_names($names, $userid, $status);
			\DB::commit();

			if ($insert > 0) {
				return ['status' => true];
			}

			return ['status' => false];
		}
		catch (\Illuminate\Database\QueryException $e) {
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
		catch (\Exception $e) { #error occurred
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
	}

	public static function insert_user_description($description, $userid, $status = 1)
	{
		try {
			\DB::beginTransaction();
			$insert = UserModel::insert_user_description($description, $userid, $status);
			\DB::commit();

			if ($insert > 0) {
				return ['status' => true];
			}

			return ['status' => false];
		}
		catch (\Illuminate\Database\QueryException $e) {
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
		catch (\Exception $e) { #error occurred
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
	}

	public static function update_user_status($userid)
	{
		try {
			\DB::beginTransaction();
			$update = UserModel::update_status($userid);
			\DB::commit();
			if ($update == 1) {
				return ['status' => true];
			}

			return ['status' => false];
		}
		catch (\Illuminate\Database\QueryException $e) {
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
		catch (\Exception $e) { #error occurred
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
	}

	public static function update_user_password($newpassword, $userid, $status = 1)
	{
		try {
			\DB::beginTransaction();
			$update = UserModel::update_user_password($newpassword, $userid, $status);
			\DB::commit();
			if ($update == 1) {
				return ['status' => true];
			}

			return ['status' => false];
		}
		catch (\Illuminate\Database\QueryException $e) {
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
		catch (\Exception $e) { #error occurred
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
	}

	public static function update_user_email($newemail, $userid, $status = 1)
	{
		try {
			\DB::beginTransaction();
			$update = UserModel::update_user_email($newemail, $userid, $status);
			\DB::commit();
			if ($update == 1) {
				return ['status' => true];
			}

			return ['status' => false];
		}
		catch (\Illuminate\Database\QueryException $e) {
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
		catch (\Exception $e) { #error occurred
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
	}

	public static function update_user_names($names, $userid, $status = 1)
	{
		try {
			\DB::beginTransaction();
			$update = UserModel::update_user_names($names, $userid, $status);
			\DB::commit();

			if ($update == 1) {
				return ['status' => true];
			}

			return ['status' => false];
		}
		catch (\Illuminate\Database\QueryException $e) {
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
		catch (\Exception $e) { #error occurred
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
	}

	public static function update_user_description($description, $userid, $status = 1)
	{
		try {
			\DB::beginTransaction();
			$update = UserModel::update_user_description($description, $userid, $status);
			\DB::commit();

			if ($update == 1) {
				return ['status' => true];
			}

			return ['status' => false];
		}
		catch (\Illuminate\Database\QueryException $e) {
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
		catch (\Exception $e) { #error occurred
			\DB::rollback();
			//return message
			return ['status' => false, 'e' => $e];
		}
	}

	public static function update_user_currency ($currency) {

		if(!Auth::user()){
			$getcurrency = Currencies::select(['id', 'currency_name', 'currency_3', 'currency_symbol'])->where(['currency_3' => $currency, 'status' => 1])->get()->first()->toArray();

			session(['guest_currency' => [
			        'currency_name'   => $getcurrency['currency_name'],
			        'currency_3'      => $getcurrency['currency_3'],
			        'currency_symbol' => $getcurrency['currency_symbol']
			]]);
			session()->flash('status', 'Successfully updated your currency!');
			return redirect()->back();

		}elseif(Auth::user()) {
			$getcurrency = Currencies::select(['id', 'currency_name', 'currency_3', 'currency_symbol'])->where(['currency_3' => $currency, 'status' => 1])->get()->toArray();

			try {
				CurrencyLang::where(['user_id' => Auth::user()->id])->update(['currency_id' => $getcurrency[0]['id']]);
			} catch (\Exception $e) {
				session()->flash('status', 'An error ocurred!');
				return redirect()->back();
			}
			session()->flash('status', 'Successfully updated your currency!');
			return redirect()->back();
		}


	}

}
