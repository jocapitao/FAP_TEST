<?php

namespace App\Services\House;

use App\Models\House\Reviews;
use App\User;

class HouseReviesService
{
    public function __construct()
    {
        $this->reviews = new Reviews();
        $this->user    = new User();
    }

    public function new_review($text, $rating, $house_id, $user_id)
    {
        if (empty($text) || empty($rating) || empty($house_id) || empty($user_id)) {
            return ['status' => false];
        }

        $insert = $this->reviews->create_review($house_id, $user_id, $text, $rating);

        if (collect($insert)->isEmpty()) {
            return ['status' => false, 'content' => ['message' => ['Failed ']]];
        }

        return ['status' => true, 'content' => ['message' => ['Reviewed with success!']]];

    }

    public function get_house_reviews($house_id)
    {
        if (empty($house_id)) {
            return ['status' => false];
        }

        $get = $this->reviews->get_reviews_house($house_id);

        if (collect($get)->isEmpty()) {
            return ['status' => false, 'failed'];
        }

        foreach ($get as $key => $review) {
            $review = collect($review);
            $user_of_review = $review->get('user_id');
            $user_info = $this->user->get_user_info($user_of_review);
            if(collect($user_info)->isEmpty()){
                $get[$key]['auther_user'] = [
                    'name' => 'Unkown',
                    'username' => 'n/D'
                ];
                continue;
            }
            unset($get[$key]['user_id']);
            $get[$key]['auther_user'] = $user_info;
        }

        return ['status' => true, 'content' => ['reviews' => $get]];
    }
}