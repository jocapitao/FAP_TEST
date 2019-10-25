<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Checkout\CheckoutController;
use App\Models\Checkout\CheckoutProcess;
use App\Models\Houses;
use App\Models\User\UserAddresses;
use G2\L\Payments\Checkout\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Currency\CurrencyController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;

class BookingManagementController extends Controller
{
	public static function get_index_bookings()
	{
		CurrencyController::cache_currencies();

		if (AuthController::get_user_status() == 0) {
			return redirect('');
		}

		if (\Auth::user()->is_host != 1) {
			return ['not alowed'];
		}

		return view('pages.host.host-bookings', [
		        'user_logged'   => AuthController::get_user_status(),
		        'user_currency' => ['user_currency' => UserController::get_user_currency(Auth::user()->id, 1)],
		        'css'           => [
			    '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.css"/>',
			    '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/themes/nest.css"/>', '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/css/selectize.legacy.css"/>',
			    '<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css', '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/css/selectize.legacy.css"/>',
		        ],
		        'js'            => [
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/cleave.min.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/addons/cleave-phone.i18n.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/js/standalone/selectize.min.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/chart.js/') . '/chart.min.js"></script>',
			    '<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>',
			    '<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/money.js/') . '/money.min.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/currencyFormatter.js/') . '/dist/currencyFormatter.min.js"></script>',
		        ]
		]);
	}

	public static function get_index_booking($booking_id)
	{
		return view('pages.host.host-booking', [
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
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/jBox.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/number-to-words/') . '/numberToWords.min.js"></script>',
			    '<script type="text/javascript" src="https://momentjs.com/downloads/moment.js">',
		        ]
		]);
	}

	public static function get_hoster_bookings($user_id = 0)
	{
		$get_houses = Houses::select('id', 'name')->where('status', 1)->where('user_id', 71)->get();
		$get_houses = collect($get_houses);

		$booked = [];
		$i      = 0;
		foreach ($get_houses as $key => $house) {
//			return CheckoutProcess::where('house_id',$house->id)->get();
			$get_bookings = CheckoutProcess::select(['checkout_status', 'checkout_id', 'check_in', 'check_out', 'checkout_id', 'created_at', 'guest_nr', 'currency'])->where('house_id', $house->id)->where('status', 1)->where('checkout_status', '<', '3')->orderBy('created_at', 'DESC')->get()->first();
			if (collect($get_bookings)->isEmpty()) {
				continue;
			}
			$booked[$i]             = collect($get_bookings);
			$booked[$i]['total']    = CheckoutController::get_checkout_total_price($get_bookings->checkout_id);
			$booked[$i]['currency'] = CurrencyController::get_currency($get_bookings->currency);
			$booked[$i]['house']    = $house->name;

			$i++;
		}

		return $booked;
	}

	public static function get_booking($booking_id)
	{
		$get_booking = CheckoutProcess::where('checkout_id', $booking_id)->get()->first();
		$house_id    = collect($get_booking)->get('house_id');

		$get_house    = Houses::where('id', $house_id)->get()->first();
		$user_address = UserAddresses::where('id', collect($get_booking)->get('user_address_id'))->get()->first();

		return [
		        'checkout_info' => $get_booking,
		        'house_info'    => $get_house,
		        'user_address'  => $user_address,
		        'currency'      => CurrencyController::get_currency(collect($get_house)->get('currency_id')),
		        'compiled_info' => [
			    'total_price' => CheckoutController::get_checkout_total_price($booking_id),
		        ]
		];
	}
}
