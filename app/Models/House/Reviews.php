<?php

namespace App\Models\House;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    public $table = "fap_reviews";
    protected $fillable = [
        'user_id', 'house_id', 'message', 'rating'
    ];

    public function create_review($house_id, $user_id, $message, $rating)
    {
        $this->user_id  = $user_id;
        $this->house_id = $house_id;
        $this->message  = $message;
        $this->rating   = $rating;

        $this->save();

        return $this;
    }

    public function get_reviews_house($house_id)
    {
        return $this->select('user_id', 'house_id', 'message', 'rating')->where('house_id',$house_id)->get();
    }

    public function get_reviews_user($user_id)
    {

    }
}
