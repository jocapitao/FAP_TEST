<?php

namespace App\Services\User;

use App\Http\Controllers\Currency\CurrencyController;
use App\Http\Controllers\Currency\RatesController;
use App\Models\Checkout\CheckoutProcess;
use App\Models\Checkout\OrderPayments;
use App\Models\Currencies;
use App\Models\Houses;
use App\Models\User\UserAddresses;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserReservationsService
{
    public function __construct()
    {
        $this->user           = Auth::user();
        $this->user_addresses = new UserAddresses();
        $this->reservations   = new CheckoutProcess();
        $this->rates          = new RatesController();
        $this->currency       = new Currencies();
        $this->house          = new Houses();
        $this->payment_method = new OrderPayments();
    }

    public function get_reservation_info_compiled($checkout_id)
    {
        $reservation = collect($this->reservations->get($checkout_id));

        if (Auth::user()->id !== $reservation->get('user_id')) {
            return ['status' => false, 'content' => ['message' => ['Not allowed']]];
        }

        $guests      = $reservation->get('guest_nr');
        $guests_info = $this->format_reservation_guests_info($reservation->get('guests_info'));

        $costs_compiled = $this->calculate_reservations_costs_compiled($checkout_id, $guests);

        $get_user_address = $this->user_addresses->get($reservation->get('user_address_id'));

        if (collect($get_user_address)->isEmpty()) {
            $user_address['configured'] = false;
            $user_address['message']    = 'The user has not yet completed this section of the checkout.';
        } else {
            $user_address['configured'] = true;
            $user_address['content']    = collect($get_user_address)->except([
                'id', 'created_at', 'updated_at', 'status', 'user_id'
            ]);
        }

        $days_compile = [
            'check_in'   => $reservation->get('check_in'),
            'check_out'  => $reservation->get('check_out'),
            'created_at' => $reservation->get('created_at'),
        ];

        $data_compiled = [
            'guests'     => [
                'number' => $guests,
                'info'   => $guests_info,
            ],
            'buyer_info' => $user_address,
            'costs'      => $costs_compiled,
            'days'       => $days_compile,
        ];

        $message_status = 'N/A';
        $message_label  = 'primary';
        if ($reservation->get('checkout_status') === 1) {
            $message_status = 'Not paid';
            $message_label  = 'warning';
        } elseif ($reservation->get('checkout_status') === 0) {
        } elseif ($reservation->get('checkout_status') === 2) {
            $message_status = 'Missing Payment';
            $message_label  = 'warning';
        } elseif ($reservation->get('checkout_status') === 3) {
            $message_status = 'Completed';
            $message_label  = 'success';
        } elseif ($reservation->get('checkout_status') === 4) {
            $message_status = 'Canceled';
            $message_label  = 'danger';
        }

        $data_compiled['reservation_status'] = ['status' => $reservation->get('checkout_status'), 'message' => $message_status, 'label' => $message_label];
        $data_compiled['checkout_id']        = $checkout_id;
//        return $reservation->get('house_id');
        $data_compiled['house_info']              = $this->house->get_house($reservation->get('house_id'));
        $data_compiled['checkout_payment_method'] = $this->format_payment_method($checkout_id);

        return collect($data_compiled)->put('status', true)->sortKeys();
//        return collect($data_compiled)->put('status', true)->sortKeys();
    }

    public function calculate_reservations_costs_compiled($checkout_id, $nr_guests)
    {
        $price = $this->reservations->get_price($checkout_id);#price
        $price = $price['price'];
        $visit = $this->reservations->get_visit_price($checkout_id);#visit_price
        if (collect($visit)->isNotEmpty()) {
            $visit = collect(json_decode($visit['visits'], true));
            if (collect($visit)->get('price')) {
                $visit = collect($visit)->get('price');
            } else {
                $visit = 0;
            }
        }
        $meal = $this->reservations->get_meal_price($checkout_id);#meal_price
        if (collect($meal)->isNotEmpty()) {
            $meal = collect(json_decode($meal['meals'], true));
            if (collect($meal)->get('price')) {
                $meal = collect($meal)->get('price');
            } else {
                $meal = 0;
            }
        }
        $airport_pickup = $this->reservations->get_airport_pickup($checkout_id);#airport_pickup
        if (collect($airport_pickup)->isNotEmpty()) {
            $airport_pickup = json_decode($airport_pickup['airport_transport'], true);
            if (collect($airport_pickup)->get('price')) {
                $airport_pickup = collect($airport_pickup)->get('price');
            } else {
                $airport_pickup = 0;
            }
        }
        $night = $this->reservations->get_night_price($checkout_id);#night_price
        if (collect($night)->isNotEmpty()) {
            $night = json_decode($night['night_activities'], true);
            if (collect($night)->get('price')) {
                $night = collect($night)->get('price');
            } else {
                $night = 0;
            }
        }
        $cleaning = $this->reservations->get_cleaning_price($checkout_id);#cleaning_price
        $cleaning = collect($cleaning)->get('cleaning_fee');

        $rate = $this->reservations->get_rate($checkout_id);#rate
        if (collect($rate)->isNotEmpty()) {
            $rate = json_decode($rate['rates'], true);
            if (collect($rate)->get('rates_code')) {
                $rate = $this->rates->get_single_rate($rate['rates_code']);
                $rate = $rate['standard_rate'];
            }
        }

        $currency = $this->reservations->get_currency_id($checkout_id)['currency'];#currency_id
        $currency = $this->currency->get_currency($currency);

        $calculus = [
            'price'      => [
                'price'                      => $price,
                'price_w_guests'             => ($price * intval($nr_guests)),
                'price_w_tax'                => (floatval($price) * (floatval("1." . intval($rate)))),
                'price_w_tax_w_guests'       => ((floatval($price) * intval($nr_guests)) * (floatval("1." . intval($rate)))),
                'tax_amount'                 => (floatval($price) * (floatval("0." . intval($rate)))),
                'tax_amount_w_guests'        => ((floatval($price) * intval($nr_guests)) * ((floatval("0." . intval($rate))))),
                'price_w_tax_w_guests_w_fee' => ((floatval($price) * intval($nr_guests)) * (floatval("1." . intval($rate))) + $cleaning),
                'price_w_guests_w_fee'       => ((floatval($price) * intval($nr_guests)) + $cleaning),
                'price_fee'                  => ($cleaning),
            ],
            'activities' => [
                'visits'                  => $visit,
                'visits_w_guests'         => ($visit * $nr_guests),
                'night_fun'               => $night,
                'night_fun_w_guests'      => ($night * $nr_guests),
                'meals'                   => $meal,
                'meals_w_guests'          => ($meal * $nr_guests),
                'airport'                 => $airport_pickup,
                'airport_pickup_w_guests' => ($airport_pickup * $nr_guests),
            ],
            'currency'   => [
                $currency
            ]
        ];

        return $calculus;
    }

    public function format_payment_method ($checkout_id) {
        $info = $this->payment_method->get_method($checkout_id);
        $message = 'Payment has been completed.';
        if(collect($info)->get('completed') === 0){
            $message = 'Payment has not yet been made.';
        }
        if(collect($info)->get('payment_method') === 1){
            //paypal
            return ['method_name'=>'PayPal', 'method_id' => 1, 'completed' => collect($info)->get('completed'), 'message' => $message];
        } elseif (collect($info)->get('payment_method') === 2) {
            //cc
            return ['method_name'=>'Credit Card', 'method_id' => 2, 'completed' => collect($info)->get('completed'), 'message' => $message];
        }
        return [null];
    }

    /**
     * Receives as JSON from database to decode and format
     *
     * @param $data
     * @return mixed
     */
    public function format_reservation_guests_info($data)
    {
        $info   = json_decode($data, true);
        $info   = collect($info);
        $guests = [];

        $guests['captain'] = [
            'first_name' => $info->get('first_name_captain'),
            'last_name'  => $info->get('last_name_captain'),
            'country'    => $info->get('country_captain'),
        ];

        if ($info->get('first_name_guests')) {
            foreach ($info->get('first_name_guests') as $key => $value) {
                $guests['guests']['guest_' . $key] = [
                    'first_name'    => $info->get('first_name_guests')[$key],
                    'last_name'     => $info->get('last_name_guests')[$key],
                    'country'       => $info->get('country_guests')[$key],
                    'email_address' => $info->get('email_guests')[$key],
                ];
            }
        }

        return $guests;
    }

    public function get_reservations_costs()
    {

    }
}