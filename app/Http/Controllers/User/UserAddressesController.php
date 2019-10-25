<?php

namespace App\Http\Controllers\User;

use App\Models\User\UserAddresses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAddressesController extends Controller
{
	public static function create($user_id, $params, $status = 1)
	{
		$user_addresses               = new UserAddresses();

		$user_addresses->user_id      = $user_id;
		$user_addresses->first_name   = $params['first_name'];
		$user_addresses->last_name    = $params['last_name'];
		$user_addresses->address_1    = $params['address_1'];
		$user_addresses->address_2    = $params['address_2'];
		$user_addresses->city         = $params['city'];
		$user_addresses->zip          = $params['zip'];
		$user_addresses->state_region = $params['state_region'];
		$user_addresses->country_id   = $params['country_id'];

		$user_addresses->save();
		return $user_addresses->id;
	}

	public static function get($user_id)
	{

	}

	public static function update($user_id, $params, $status = 1)
	{

	}
}
