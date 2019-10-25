<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\ValidationsController;
use App\Models\User\UserModel;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Messages\MessagesController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountSettingsController extends Controller
{
	public static function index()
	{
		$is_host = 0;

		if (AuthController::get_user_status() === true) {
			$is_host = \Auth::user()->is_host;
		}

		$currency_list  = SiteController::get_currency_list();
		$languages_list = SiteController::get_languages_list();
//		dd(?);
		return view('pages.account-settings.content', [
		        'user_logged'    => AuthController::get_user_status(),
		        'is_host'        => $is_host,
		        'currency_list'  => $currency_list,
		        'languages_list' => $languages_list,
		        'stylesheets'    => [
			    '<link rel="stylesheet" href="' . \URL::to("/") . 'plugins/revolution/css/settings.css">'
		        ],
		        'css'            => [
			    '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/jBox.css"/>',
			    '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/plugins/Notice/jBox.Notice.css"/>',
		        ],
		        'js'             => [
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/jBox.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/plugins/Notice/jBox.Notice.min.js"></script>',

		        ]
		]);
	}

	public static function get_update_currency_lang(Request $request)
	{
		$validate_currency = ValidationsController::validate_currency($request->account_currency);
		$answer            = [
		        'status_currency' => false,
		        'status_language' => false
		];

		if ($validate_currency['status'] == true) {
			$update = self::update_currency([
			        'user_id'     => Auth::user()->id,
			        'currency_id' => $request->account_currency
			]);


			if ($update['status'] == true) {
				$answer['status_currency'] = true;
			}


		}

		$validate_language = ValidationsController::validate_language($request->account_language);


		if ($validate_language['status'] == true) {
			$update = self::update_language([
			        'user_id' => Auth::user()->id,
			        'lang_id' => $request->account_language
			]);

			if ($update['status'] == true) {
				$answer['status_language'] = true;
			}
		}

		if ($answer['status_currency'] == true && $answer['status_language'] == true) {
			\DB::commit();
			return ['status' => true];
		}

	}

	public static function insert_user_currency_lang($userid)
	{
		try {
			\DB::beginTransaction();
			$insert = UserModel::insert_user_currency_lang($userid);

			if ($insert == 1) {
				\DB::commit();
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

	public static function update_password(Request $request)
	{

		$validation = \Validator::make($request->only([
		        'old_password'
		]), [
		        'old_password' => 'required'
		], MessagesController::password_reset());

		if ($validation->fails()) { #if the validations fails
			return response()->json([
			        "status"   => false,
			        "messages" => $validation->errors()
			], 200);
		}

		$password = [
		        'old_pw'      => $request->old_password,
		        'new_pw'      => $request->password,
		        'new_pw_conf' => $request->password_confirmation
		];

		$userpassword = AuthController::get_user_password(Auth::user()->id);

		if ($userpassword['status'] == true) {
			$pw = $userpassword['content']->password;
			if (Hash::check($password['old_pw'], $pw)) {

				if ($password['new_pw'] != $password['new_pw_conf']) {
					return ['status'   => false,
					        'result'   => false,
					        'messages' => [
						    trans('profile.profile_password_new_confirmation_confirmed')
					        ]
					];
				} else {
					if (strlen($password['new_pw']) < 5) {
						return ['status'   => false,
						        'result'   => false,
						        'messages' => [
							    trans('profile.profile_password_new_min')
						        ]
						];
					}
				}

				$newpw = Hash::make($password['new_pw'], ['rounds' => 16]);

				$updatepassword =
				        UserController::update_user_password($newpw, \Auth::user()->id);

				if ($updatepassword['status'] == true) {
					return ['status'   => true,
					        'result'   => true,
					        'messages' => [
						    'Success!'
					        ]
					];
				}


			}
			return ['status' => false, 'messages' =>
			        [
				    trans('profile.profile_password_old_failed')
			        ]
			];
		}


	}

	public static function update_email(Request $request)
	{
		$validation = \Validator::make($request->only([
		        'old_email'
		]), [
		        'old_email' => 'required'
		], MessagesController::password_reset());

		if ($validation->fails()) { #if the validations fails
			return response()->json([
			        "status"   => false,
			        "messages" => $validation->errors()
			], 200);
		}

		$useremail = \Auth::user()->email;

		if ($useremail != $request->old_email) {
			return [
			        'status'   => false,
			        'result'   => false,
			        'messages' => [
				    trans('profile.profile_email_old_failed')
			        ]
			];
		}

		$validation = \Validator::make($request->only([
		        'email', 'email_confirmation'
		]), [
		        'email'              => 'required',
		        'email_confirmation' => 'required'
		], MessagesController::password_reset());

		if ($validation->fails()) { #if the validations fails
			return response()->json([
			        "status"   => false,
			        "messages" => $validation->errors()
			], 200);
		}

		$email = [
		        'old_email'      => $request->old_email,
		        'new_email'      => $request->email,
		        'new_email_conf' => $request->email_confirmation
		];

		if ($email['new_email'] != $email['new_email_conf']) {
			return [
			        'status'   => false,
			        'result'   => false,
			        'messages' => [
				    trans('profile.profile_email_new_confirmation_confirmed')
			        ]
			];
		}

		if (strlen($email['new_email']) < 5) {
			return [
			        'status'   => false,
			        'result'   => false,
			        'messages' => [
				    trans('profile.profile_email_new_min')
			        ]
			];
		}

		$update_email = UserController::update_user_email($email['new_email'], \Auth::user()->id);

		if ($update_email['status'] == true) {
			return [
			        'status'   => true,
			        'result'   => true,
			        'messages' => [
				    trans('profile.profile_email_success')
			        ]
			];
		}

		return [
		        'status'   => false,
		        'result'   => false,
		        'messages' => [
			    trans('profile.profile_email_failed')
		        ]
		];

	}

	public static function update_currency($data)
	{
		try {
			\DB::beginTransaction();
			$update = UserModel::update_user_currency($data);
			//\DB::commit();

			return ['status' => true];

			/*if ($update == 1) {
				return ['status' => true];
			}

			return ['status' => false];*/
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

	public static function update_language($data)
	{
		try {
			\DB::beginTransaction();
			$update = UserModel::update_user_lang($data);
//			if ($update == 1) {
			return ['status' => true];
			/*}
			return ['status' => false];*/
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
}
