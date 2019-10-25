<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can account web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::middleware('guest')->group(function () {
	//login
	Route::get('/login', 'User\AuthController@get_index')->name('login');
	Route::post('/login', 'User\AuthController@get_login');

	Route::get('/register', 'User\RegisterController@get_index');
	Route::post('/register', 'User\RegisterController@get_register');
	Route::get('/register/verify/{token}', 'User\RegisterController@get_index_verify_page');
});

Route::middleware(['guest', 'auth'])->group(function(){

});

#allowed from both authed and guest
//index
Route::get('/', 'Pages\GenericPagesController@get_index');

Route::get('/home', 'Pages\GenericPagesController@get_index')->name('home');

Route::get('search/{page}/{stringsearch?}/{room?}/{guests?}/{price?}/{commodities?}/{property?}/{housetype?}/{housespacing?}/{stay_type?}/{start_date?}/{end_date?}', 'Search\SearchController@get_search_index');
Route::get('search/', 'Search\SearchController@get_search_index');
Route::post('search/', 'Search\SearchController@get_house_list_page');
Route::post('search/{page}/{stringsearch?}/{room?}/{guests?}/{price?}/{commodities?}/{property?}/{housetype?}/{housespacing?}/{stay_type?}/{start_date?}/{end_date?}', 'Search\SearchController@get_house_list_page');

Route::get('house/{slug}', 'Houses\HouseController@get_house_index');
Route::get('house/{slug}/reviews', 'Houses\ReviewsController@handle_get_review');
Route::post('house/{slug}', 'Houses\HouseController@get_house');
Route::post('house/property/properties', 'Houses\HouseController@get_house_property_properties');
Route::post('house/{house_slug}/rules', 'Houses\HouseController@get_house_rules');

#authed requested
Route::middleware(['auth'])->group(function(){
    #user account profile
    Route::get('/account-settings', 'User\AccountSettingsController@index');
    Route::post('/account-settings/updatepassword', 'User\AccountSettingsController@update_password');
    Route::post('/account-settings/updateemail', 'User\AccountSettingsController@update_email');
    Route::post('/account-settings/update_currency_lang', 'User\AccountSettingsController@get_update_currency_lang');

    #profileuser
    Route::get('/edit-profile', 'User\EditProfileController@index');
    Route::get('/profile/{username}', 'User\ProfileController@index');
    Route::post('/edit-profile/update_simple_info', 'User\EditProfileController@simple_info_form');
    Route::post('/edit-profile/update_description', 'User\EditProfileController@description_form');
    Route::post('/edit-profile/update_info', 'User\EditProfileController@info_form');
    Route::post('/edit-profile/update_social_networks', 'User\EditProfileController@social_networks_form');
    Route::post('/file-upload/profile', 'User\EditProfileController@upload_file');

    #host management
    Route::get('host-management', 'Host\HostingController@get_index');
    Route::get('host-management/my-houses', 'Host\HostingController@get_index_my_houses');
    Route::get('host-management/my-houses/houses/get', 'Host\HostingController@get_hoster_houses');

    Route::get('host-management/add-house', 'Host\HostingController@get_index_new_house');
    Route::get('host-management/bookings', 'Host\BookingManagementController@get_index_bookings');
    Route::get('host-management/booking/{booking_id}', 'Host\BookingManagementController@get_index_booking');
    Route::get('host-management/booking/{booking_id}/get', 'Host\BookingManagementController@get_booking');
    Route::get('host-management/bookings/get', 'Host\BookingManagementController@get_hoster_bookings');
    Route::post('host-management/add-house', 'Houses\HouseController@get_insert_house');

    #misc
    Route::post('/currency/get/rates', 'Currency\RatesController@get_rates_post');
    Route::post('/host/house/get/rules/{type}', 'Host\HostingController@get_house_rules'); //{ list or comma separed}
    Route::post('/file-upload', 'Host\HostingController@upload_file');
});

#more authed
Route::middleware('auth')->group(function () {
	Route::get('test', 'Houses\HouseController@test');
	Route::get('host-management/profile/edit', 'Host\HostProfileController@get_index');
	Route::post('host-management/profile/update', 'Host\HostProfileController@update');

	Route::get('checkout/house/{house_id}/step-{step_nr}','Checkout\CheckoutController@get_index');

	Route::post('checkout','Checkout\CheckoutController@get_checkout');

	Route::post('checkout/guests-info','Checkout\CheckoutController@store_data_guests');
	Route::post('checkout/step-1','Checkout\CheckoutController@store_data_step_1');
	Route::post('checkout/step-2','Checkout\CheckoutController@store_data_step_2');
	Route::post('checkout/step-3','Checkout\CheckoutController@store_data_step_3');

	Route::get('my-reservations', 'User\UserReservationsController@get_user_reservations_index');
	Route::get('my-reservations/reservation/{checkout_id}', 'User\UserReservationsController@get_user_reservation_index');
	Route::post('my-reservations/reservation/{checkout_id}', 'User\UserReservationsController@get_user_reservation_single');
	Route::get('my-reservations/get', 'User\UserReservationsController@get_user_reservations');
	Route::get('my-reservations/get/{checkout_id}', 'User\UserReservationsController@get_user_reservation');

	Route::get('host-management/statistics', 'Host\StatisticsController@get_index');
	Route::get('host-management/statistics/get-5', 'Host\StatisticsController@get_last_five');

	#Route HOST
    Route::post('host-management/profile/edit/request/new-club', 'LeaguesClubs\ClubsRequestController@handle_create_request');
});

Route::middleware('throttle:100,1')->group(function () {
	Route::get('update/currency/{currency}', 'User\UserController@update_user_currency');
});

Route::get('/logout', function () {
	Auth::logout();
	return redirect('/');
})->name('logout');

Route::get('/img-test', function()
{
	$img = Image::make('https://i.imgur.com/lkxfJoi.jpg')->resize(300, 200);

	return $img->response('jpg');
});

Route::get('formater/leagues', 'LeagueMakerController@formater');
Route::post('formater/leagues', 'LeagueMakerController@formater_show');

Route::get('test','TestController@test');
Route::post('test','TestController@post');

Route::get('admin_area', ['middleware' => 'admin', function () {
    return view('admin.pages.home');
}]);

Route::middleware(['auth', 'admin'])->prefix('admin_area')->group(function(){
    Route::get('users-management', function(){
        return view('admin.pages.users.admin-users');
    });

    #gets
    Route::get('/get/user/{user_id}', function($user_id){
        return view('admin.pages.users.admin-user-view-edit', [
            'user_id' => $user_id,
        ]);
    });

    #posts - gets
    Route::post('/get/users', 'Admin\Users\AdminUsersController@get_users');
    Route::post('/get/user/{user_id}', 'Admin\Users\AdminUsersController@get_user');
<<<<<<< Updated upstream
});
=======
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> Stashed changes
