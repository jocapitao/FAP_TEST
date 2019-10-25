<?php

namespace App\Http\Middleware;

use App\Http\Controllers\User\UserController;
use Closure;

class CurrencyMiddleware
{

	public function __construct()
	{
		$this->handle();
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure                 $next
	 *
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$usercurrency = UserController::get_user_currency(Auth::user()->id, 1);
		return $next($next);
	}
}
