<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class AuthModel extends Model
{
	public static function get_password($userid, $status)
	{
		return \DB::table('fap_users')
		        ->select('password')
		        ->where([
			    'id' => $userid,
			    'status' => $status
		        ])
		        ->get();
	}
}
