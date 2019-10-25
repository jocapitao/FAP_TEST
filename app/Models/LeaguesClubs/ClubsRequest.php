<?php

namespace App\Models\LeaguesClubs;

use Illuminate\Database\Eloquent\Model;

class ClubsRequest extends Model
{
    public $table = "request_clubs_names";
    protected $fillable
        = [
            "user_id", "club_name", "club_league", "status"
        ];

    public function get($club_name)
    {
        return $this->where('club_name', 'LIKE', $club_name)->get()->first();
    }

    /**
     * Inserts in the database the request
     * @param $user_id -> user who requested it
     * @param $club_name
     * @param $club_league
     */
    public function create($user_id, $club_name, $club_league)
    {
        $this->user_id     = $user_id;
        $this->club_name   = $club_name;
        $this->club_league = $club_league;

        $this->save();

        return $this;

    }

    public function remove()
    {

    }
}
