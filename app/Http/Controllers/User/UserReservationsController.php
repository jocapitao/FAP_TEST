<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Currency\RatesController;
use App\Models\Checkout\CheckoutProcess;
use App\Models\Currencies;
use App\Models\Houses;
use App\Services\User\UserReservationsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserReservationsController extends Controller
{
    public function __construct()
    {
        $this->service = new UserReservationsService();
    }

    public static function get_user_reservations_index()
	{
		return view('pages.profile.my-reservations', [
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
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jquery-loading/') . '/dist/jquery.loading.min.js"></script>',
			    '<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>',
			    '<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/jBox.js"></script>',
			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/plugins/Notice/jBox.Notice.min.js"></script>',
			    '<script type="text/javascript" src="https://momentjs.com/downloads/moment.js">',
		        ]
		]);
	}

	public function get_user_reservation_index ($checkout_id) {
        return view('pages.profile.reservation', [
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
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jquery-loading/') . '/dist/jquery.loading.min.js"></script>',
                '<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>',
                '<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/number-to-words/') . '/numberToWords.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/jBox.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jBox/') . '/Source/plugins/Notice/jBox.Notice.min.js"></script>',
                '<script type="text/javascript" src="https://momentjs.com/downloads/moment.js">',
            ]
        ]);
    }

    public function get_user_reservation_single ($checkout_id) {
        return $this->service->get_reservation_info_compiled($checkout_id);
    }

	public static function get_user_reservations()
	{
		$reservations = CheckoutProcess::select('id', 'house_id', 'checkout_status', 'check_in', 'check_out', 'checkout_id','created_at', 'rates')->get();

		foreach ($reservations as $key => $reservation) {
			$get_total                      = CheckoutController::get_checkout_total_price($reservation->checkout_id);
			$house_info                     = Houses::select('currency_id', 'rates','name')->where('id', $reservation->house_id)->get()->first();
			$currency_data                  = Currencies::select('currency_3', 'currency_name', 'currency_symbol')->where('id', $house_info['currency_id'])->get()->first();
			$reservations[$key]['total']    = $get_total;
			$reservations[$key]['currency'] = $currency_data;
			$reservations[$key]['house']    = $house_info;
			$rates                          = json_decode($reservation->rates, TRUE);

			if (collect($rates)->get('rates_code')) {
				$rate_percentage                       = RatesController::get_rate(collect($rates)->get('rates_code'));
				$reservations[$key]['rate_percentage'] = collect($rate_percentage)->get('standard_rate');
			}

			collect($reservations[$key])->forget('rates');
		}

		return $reservations;
	}

	public static function get_user_reservation($checkout_id)
	{
		$reservation                = CheckoutProcess::where('checkout_id', $checkout_id)->get()->first();
		$reservation['guests_info'] = json_decode(collect($reservation)->get('guests_info'));

		if (collect(json_decode($reservation['rates']))->get('rates_code')) {
			$rate_percentage                = RatesController::get_rate(collect(json_decode($reservation['rates']))->get('rates_code'));
			$reservation['rate_percentage'] = collect($rate_percentage)->get('standard_rate');
		}

		return $reservation;
	}
}
