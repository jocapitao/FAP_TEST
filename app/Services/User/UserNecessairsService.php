<?php

namespace App\Services\User;

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;

class UserNecessairsService
{
    public function __construct()
    {

    }

    public function fetch_user_needs($user_id = 0)
    {
        //user logged
        //user currency
        return [
            'user_logged' => AuthController::get_user_status(),
            'user_currency' => [
                'user_currency' => UserController::get_user_currency((Auth::user() ? Auth::user()->id : 0), 1)
            ],
        ];

    }
}