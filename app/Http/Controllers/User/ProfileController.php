<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StaticInfoController;

class ProfileController extends Controller
{
	public static function index($username)
	{
		$userid = UserController::get_userid_by_username($username);
		if ($userid['status'] == false) {
			return [
			        'status' => false,
			        'messages' => [
			                'Could not find this user'
			        ]
			];
		}
		$userid = $userid['userid'];

		$userinfo = UserController::get_user_profile_info($userid);

		if ($userinfo['status'] == true) {
			if ($userinfo['profile'] == 0) { #return with default data cuz nothing is setup yet
				return view('pages.profile.profile', [
				        'user_logged' => AuthController::get_user_status(),
				        'user_info' => [
					    'first_name' => 'Define',
					    'last_name' => 'Your Name',
					    'description' => 'Say something about you to get yourself familiarized with others!',
					    'contact' => 'A way to people contact you',
					    'country' => 'Where are you from',
					    'gender' => 'How do you identify yourself?',
					    'dob' => 'What is your age',
					    'city' => 'In what city?',
					    'email' => 'Leave your email address for an easier way of contact.',
				        ],
				        'countries' => StaticInfoController::country_list(),
				        'genders' => StaticInfoController::gender_list(),
				        'css' => [
					    '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.css"/>',
					    '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/themes/mint.css"/>',
					    '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/css/selectize.legacy.css"/>',
				        ],
				        'js' => [
					    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.min.js"></script>',
					    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/cleave.min.js"></script>',
					    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/addons/cleave-phone.i18n.js"></script>',
					    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/js/standalone/selectize.min.js"></script>',
					    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/fastersearch/') . '/dist/fastsearch.min.js"></script>',
				        ]
				]);
			}

			if ($userinfo['profile'] == 1) { #return with the user info that exists
				return view('pages.profile.profile', [
				        'user_logged' => AuthController::get_user_status(),
				        'user_info' => $userinfo['profile_info'],
				        'countries' => StaticInfoController::country_list(),
				        'genders' => StaticInfoController::gender_list(),
				        'css' => [
					    '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.css"/>',
					    '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/themes/nest.css"/>', '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/css/selectize.legacy.css"/>',
				        ],
				        'js' => [
					    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.js"></script>',
					    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/cleave.min.js"></script>',
					    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/addons/cleave-phone.i18n.js"></script>',
					    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/js/standalone/selectize.min.js"></script>',
					    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/fastersearch/') . '/dist/fastsearch.min.js"></script>',
				        ]
				]);
			}

		}
	}
}
