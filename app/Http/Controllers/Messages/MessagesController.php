<?php

namespace App\Http\Controllers\Messages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
	public static function registration()
	{
		return [
		        'register_name.required' => trans('messages_register.register_name_required'),
		        'register_name.min' => trans('messages_register.register_name_min', ['min' => ':min']),
		        'register_name.max' => trans('messages_register.register_name_max', ['max' => ':max']),

		        'register_email.unique' => trans('messages_register.register_email_unique'),
		        'register_email.email' => trans('messages_register.register_email_email'),
		        'register_email.required' => trans('messages_register.register_email_required'),
		        'register_email.max' => trans('messages_register.register_email_min', ['min', ':min']),
		        'register_email.min' => trans('messages_register.register_email_max', ['max', ':max']),

		        'register_username.required' => trans('messages_register.register_username_required'),
		        'register_username.unique' => trans('messages_register.register_username_unique'),

		        'register_password.required' => trans('messages_register.register_password_required'),
		        'register_password.confirmed' => trans('messages_register.register_password_matched'),

		        'register_tos.required' => trans('messages_register.register_tos_required')

		];
	}

	public static function login()
	{
		return [
		        'login_email.required' => trans('messages_login.login_username_email_failed'),
		        'login_password.required' => trans('messages_login.login_password_failed'),
		];
	}

	public static function password_reset()
	{
		return [
		        'old_password.required' => trans('profile.profile_password_old_required'),
		        'new_password.required' => trans('profile.profile_password_new_required'),
		        'new_password.min' => trans('profile.profile_password_new_min'),
		        'new_password_confirmation.required' => trans('profile.profile_password_new_confirmation_required'),
		        'new_password_confirmation.confirmed' => trans('profile.profile_password_new_confirmation_confirmed'),
		];
	}

	public static function email_reset() {
		return [
		        'email.required' => trans('profile.profile_email_new_required'),
		        'email_confirmation.required' => trans('profile.profile_email_new_confirmation_required')
		];
	}
}
