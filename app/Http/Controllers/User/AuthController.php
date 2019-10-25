<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Messages\MessagesController;
use App\Models\User\AuthModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function __construct()
	{
		\App::setLocale('pt');
	}

	public static function get_index()
	{
		return view('auth.login.content', [
		    'user_logged' => false
        ]);
	}

	/**
	 * Retrieves user status FALSE OR TRUE if logged in or NOT
	 */
	public static function get_user_status()
	{
		$user_logged = false;
		if (\Auth::check()) {
			$user_logged = true;
		}

		return $user_logged;
	}

	public static function get_login(Request $request)
	{
		$validation = Validator::make($request->only([
		        'login_email',
		        'login_password',
		]),
		        [
			    'login_email' => 'required',
			    'login_password' => 'required',
		        ], MessagesController::login());

		if ($validation->fails()) { #if the validations fails
			return response()->json([
			        "status" => false,
			        "messages" => $validation->errors()
			], 200);
		}

		$username = $request->login_email;
		$password = $request->login_password;

		$remember = false;
		if ($request->remember) {
			$remember = true;
		}

		$validateifemail = filter_var($username, FILTER_VALIDATE_EMAIL);

		if ($validateifemail == true) {
			$userid = UserController::get_userid_by_email($username);
		} else {
			$userid = UserController::get_userid_by_username($username);
		}

		if ($userid['status'] == false) {
			return ['status' => false,
			        'messages' => [
				    trans('messages_login.login_failed_match')
			        ]
			];
		}

		$userpassword = self::get_user_password($userid['userid']);

		if ($userpassword['status'] == true) {
			$pw = $userpassword['content']->password;
			if (Hash::check($password, $pw)) {
				\Auth::loginUsingId($userid['userid'], $remember);
				return ['status' => true, 'result' => true, 'messages' => [
					'Success!'
				]
				];
			}
			return ['status' => false, 'messages' =>
			        [
				    'Credentials do not match.'
			        ]
			];
		}

		return ['status' => false,
		        'result' => false,
		        'messages' => [
			    'End of File'
		        ]
		];
	}

	public static function get_user_password($userid, $status = 1)
	{
		try {
			\DB::beginTransaction();
			$get = AuthModel::get_password($userid, $status);
			\DB::commit();
			if (count($get) > 0) {
				return ['status' => true, 'content' => $get[0]];
			}

			return [
			        'status' => false, 'messages' =>
				    [
					'Couldnt execute query.'
				    ]
			];
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
