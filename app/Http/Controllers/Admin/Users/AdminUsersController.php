<?php

namespace App\Http\Controllers\Admin\Users;

use App\Services\Admin\AdminUsersService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUsersController extends Controller
{
    public function __construct()
    {
        $this->users_service = new AdminUsersService();
    }

    public function get_users () {
        return $this->users_service->get_users();
    }
    public function get_user ($user_id) {
        return $this->users_service->get_user($user_id);
    }
}
