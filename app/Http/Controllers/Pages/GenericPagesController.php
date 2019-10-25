<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\User\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Currency\CurrencyController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
class GenericPagesController extends Controller
{

	public static function get_index()
	{
		$is_host = 0;

		CurrencyController::cache_currencies();

		if (AuthController::get_user_status() === true) {
			$is_host = \Auth::user()->is_host;
		}

		return view('pages.home.index', [
		        'user_logged' => AuthController::get_user_status(),
		        'is_host'     => $is_host,
		        'user_currency' => [
			    'user_currency' => UserController::get_user_currency((Auth::user() ? Auth::user()->id : 0), 1)
		        ],
		]);
	}
}
