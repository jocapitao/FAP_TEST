<?php

namespace App\Http\Controllers\Host;

use App\Models\Checkout\CheckoutProcess;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\UserController;

class StatisticsController extends Controller
{
	public static function get_index()
	{
		return view('pages.host.statistics', [
		        'step_nr'       => 1,
		        'user_logged'   => AuthController::get_user_status(),
		        'user_currency' => [
			    'user_currency' => UserController::get_user_currency((Auth::user() ? Auth::user()->id : 0), 1)
		        ],
		        'css'           => [
			    '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/jquery-loading/') . '/dist/jquery.loading.min.css"/>',
			    '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">',
			    '<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">',
			    '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/plugins/Notice/jBox.Notice.css"/>',

		        ],
		        'js'            => [
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/money.js/') . '/money.min.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/currencyFormatter.js/') . '/dist/currencyFormatter.min.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jquery-loading/') . '/dist/jquery.loading.min.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jquery-loading/') . '/"></script>',
			    '<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>',
			    '<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>',
			    '<script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>',
			    '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js">',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/jBox.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/number-to-words/') . '/numberToWords.min.js"></script>',
			    '<script type="text/javascript" src="https://momentjs.com/downloads/moment.js">',


		        ]
		]);
	}

	public static function get_last_five()
	{
		$last_5 = Carbon::now()->subDay(5);
		$get_checks = CheckoutProcess::whereRaw('created_at > "'.$last_5.'"')->get();

		$dates = [];

		foreach ($get_checks as $key => $check) {
			$dates[Carbon::parse(collect($check)->get('created_at'))] = Carbon::parse(collect($check)->get('created_at'))	;
		}

		return $get_checks;
	}
}
