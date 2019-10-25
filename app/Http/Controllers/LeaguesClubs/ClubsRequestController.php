<?php

namespace App\Http\Controllers\LeaguesClubs;

use App\Services\ClubsLeagues\ClubsRequestService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClubsRequestController extends Controller
{
    public function __construct()
    {
        $this->clubs_request_service = new ClubsRequestService();
    }

    public function handle_get_request () {

    }

    public function handle_create_request (Request $request) {
        return $this->clubs_request_service->create_club_request($request->club_name, $request->club_league, Auth::user()->id);
    }
}
