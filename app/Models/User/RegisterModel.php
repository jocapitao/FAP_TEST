<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
	/**
	 * Inserts users data to db
	 * @param $data
	 * @return insert id
	 */
	public static function insert_user ($data) {
		return \DB::table('fap_users')->insertGetId(
		        $data
		);
	}

	/**
	 * inserts registration token with userid, token and friendly token
	 * @param $data
	 * @return mixed
	 */
	public static function insert_registertoken ($data) {
		return \DB::table('fap_accounttoken')->insertGetId(
		        $data
		);
	}

	public static function get_token_info ($token, $friendlytoken) {
		return \DB::table('fap_accounttoken')
		        ->select('id', 'status', 'user_id')
		        ->where([
		                'token' => $token,
			    'friendly_token' => $friendlytoken
		        ])
		        ->get();
	}

	public static function update_token_status ($tokenid) {
		return \DB::table('fap_accounttoken')
		        ->where('id', $tokenid)
		        ->update(['status'=>0]);
	}
}
