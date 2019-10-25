<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public static function test () {
	    $is_host = 0;

	    if (AuthController::get_user_status() === true) {
		    $is_host = \Auth::user()->is_host;
	    }

	    $currency_list  = SiteController::get_currency_list();
	    $languages_list = SiteController::get_languages_list();
	    return view('pages.profile.my-reservations', [
		'user_logged'    => AuthController::get_user_status(),
		'currency_list'  => $currency_list,
		'languages_list' => $languages_list,
		'is_host'        => $is_host,
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
		        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
		        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jquery-loading/') . '/dist/jquery.loading.min.js"></script>',
		        '<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>',
		        '<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>',
		        '<script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>',
		        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/jBox.js"></script>',
		        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/plugins/Notice/jBox.Notice.min.js"></script>',
		]

	    ]);
    }

    public static function post (Request $request) {
    	return [
    	        'status' => false,
		'content' => [
		        'data' => [
		        	1 => [
		        	        'house' => 'nome',
		        	        'price' => '40',
		        	        'location' => 'madrid',
			],2 => [
		        	        'house' => 'nome1',
		        	        'price' => '402',
		        	        'location' => 'madridbarca',
			]
	    		]
		]
	];
    }
}
