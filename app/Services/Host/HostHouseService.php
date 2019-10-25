<?php

namespace App\Services\Host;

use App\Models\Currencies;
use App\Models\Houses;
use App\Services\House\HouseService;

class HostHouseService
{
    public function __construct()
    {
        $this->houses        = new Houses();
        $this->house_service = new HouseService();
    }

    public function get_list_of_houses($user_id)
    {
        $houses = $this->houses->get_host_houses($user_id);

        if (collect($houses)->isEmpty()) {
            return ['status' => false, 'content' => ['message' => ['There are no houses inserted.']]];
        }

        foreach ($houses as $number => $house) {
            $houses[$number]['costs']   = $this->house_service->get_all_house_costs_calculate(collect($house)->get('id'));
//            $houses[$number]['ratings'] = null; #todo - configure after rating is implemented!!!!!!!
            $houses[$number]['ratings'] = ['stars' => rand(1,5)]; #todo - configure after rating is implemented!!!!!!
//            $houses[$number]['currency_options'] = $this->house_service->get_house_currency_with_user_currency(collect($house)->get('currency_id'));
        }

        return ['status' => true, 'content' => ['houses' => $houses]];
    }

}