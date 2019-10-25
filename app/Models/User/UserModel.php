<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
	public static function get_userid_by_email($email, $status = 1)
	{
		return \DB::table('fap_users')
		        ->select('id')
		        ->where(["email" => $email, "status" => $status])
		        ->get();
	}

	public static function get_userid_by_username($username, $status = 1)
	{
		return \DB::table('fap_users')
		        ->select('id')
		        ->where(["username" => $username, "status" => $status])
		        ->get();
	}

	public static function get_user_profile_info($userid, $status)
	{
		return \DB::table('fap_users_profile')
		        ->select('first_name', 'last_name',
			    'description', 'contact',
			    'country', 'gender', 'dob',
			    'city', 'email', 'settings','languages')
		        ->where(["userid" => $userid, "status" => $status])
		        ->get();
	}

	public static function get_user_names($userid, $status)
	{
		return \DB::table('fap_users_profile')
		        ->select('first_name', 'last_name')
		        ->where(["userid" => $userid, "status" => $status])
		        ->get();
	}

	public static function get_user_description($userid, $status)
	{
		return \DB::table('fap_users_profile')
		        ->select('description')
		        ->where(["userid" => $userid, "status" => $status])
		        ->get();
	}

	public static function get_user_profile_info_custom($data, $userid, $status)
	{
		return \DB::table('fap_users_profile')
		        ->select($data)
		        ->where([
			    "userid" => $userid,
			    "status" => $status
		        ])
		        ->get();
	}

	public static function insert_user_currency_lang($userid, $currencyid = 1, $langid = 1)
	{
		return \DB::table('fap_users_currency_lang')->insert(
		        [
			    'user_id'     => $userid,
			    'currency_id' => $currencyid,
			    'language_id' => $langid,
		        ]
		);
	}

	public static function insert_user_names($names, $userid)
	{
		return \DB::table('fap_users_profile')->insert(
		        [
			    'userid'     => $userid,
			    'first_name' => $names['first_name'],
			    'last_name'  => $names['last_name'],
		        ]
		);
	}

	public static function insert_user_description($description, $userid)
	{
		return \DB::table('fap_users_profile')->insert(
		        [
			    'userid'      => $userid,
			    'description' => $description,
		        ]
		);
	}

	public static function insert_user_profile_info($data)
	{
		return \DB::table('fap_users_profile')->insert(
		        $data
		);
	}

	public static function update_user_currency($data)
	{
		return \DB::table('fap_users_currency_lang')
		        ->where('id', $data['user_id'])
		        ->update([
			    'currency_id' => $data['currency_id']
		        ]);
	}

	public static function update_user_lang($data)
	{
		return \DB::table('fap_users_currency_lang')
		        ->where('user_id', $data['user_id'])
		        ->update([
			    'language_id' => $data['lang_id']
		        ]);
	}

	public static function update_status($userid)
	{
		return \DB::table('fap_users')
		        ->where('id', $userid)
		        ->update(['status' => 1]);
	}

	public static function update_user_password($newpassword, $userid, $status)
	{
		return \DB::table('fap_users')
		        ->where('id', $userid)
		        ->where('status', $status)
		        ->update([
			    'password' => $newpassword
		        ]);
	}

	public static function update_user_email($newemail, $userid, $status)
	{
		return \DB::table('fap_users')
		        ->where('id', $userid)
		        ->where('status', $status)
		        ->update([
			    'email' => $newemail
		        ]);
	}

	public static function update_user_names($names, $userid, $status)
	{
		return \DB::table('fap_users_profile')
		        ->where('userid', $userid)
		        ->where('status', $status)
		        ->update([
			    'first_name' => $names['first_name'],
			    'last_name'  => $names['last_name'],
		        ]);
	}

	public static function update_user_description($description, $userid, $status)
	{
		return \DB::table('fap_users_profile')
		        ->where('userid', $userid)
		        ->where('status', $status)
		        ->update([
			    'description' => $description
		        ]);
	}

	public static function update_user_profile_info($data, $userid, $status)
	{
		return \DB::table('fap_users_profile')
		        ->where('userid', $userid)
		        ->where('status', $status)
		        ->update($data);
	}


}
