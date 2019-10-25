<?php

namespace App\Http\Controllers\LeaguesClubs;

use App\Models\LeaguesClubs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaguesClubsController extends Controller
{
	public static function get_all($status = 1)
	{
		try {
			$get = LeaguesClubs::select(['league_native',
				'club_league',
				'clubs',
			])->where(['status' => $status])->get()->toArray();
	}
		catch (\Exception $e) {
			return ['status' => false , 'e' => $e];
		}

		return ['status' => true, 'content' => $get];
	}
}
