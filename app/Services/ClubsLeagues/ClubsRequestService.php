<?php

namespace App\Services\ClubsLeagues;

use App\Models\LeaguesClubs\ClubsRequest;

class ClubsRequestService
{
    public function __construct()
    {
        $this->clubs_request = new ClubsRequest();
    }

    public function create_club_request($club_name, $club_league, $user_id_requested)
    {
        $club_name = preg_replace("/[^A-Za-z0-9 ]/", "", $club_name);
        $club_league = preg_replace("/[^A-Za-z0-9 ]/", "", $club_league);
        #validate fields
        if (collect($club_name)->isEmpty() || collect($club_league)->isEmpty()) {
            return ['status' => false, 'content' => ['message' => ['Not all the fields were filled.']]];
        }

        #check if club isnt already requested
        $check = $this->clubs_request->get($club_name);

        if(collect($check)->isNotEmpty()){
            return ['status' => false, 'content' => ['message' => ['A request for this club is already pending. Try to add it later.']]];
        }

        #create the db entry
        $create = $this->clubs_request->create($user_id_requested, $club_name, $club_league);

        if (collect($create)->isEmpty()) {
            return ['status' => false, 'content' => ['message' => ['Could not make request right now.']]];
        }

        return ['status' => true, 'content' => ['message' => ['Club requested with success. If it gets approved it will be automatically added to your Favorite Clubs.']]];
    }
}