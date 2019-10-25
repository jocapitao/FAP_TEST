<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserAddresses extends Model
{
    protected $table = 'fap_users_addresses';

    public function create($data)
    {
        $data = collect($data);

        $this->user_id      = Auth::user()->id;
        $this->first_name   = $data->get('first_name');
        $this->last_name    = $data->get('last_name');
        $this->address_1    = $data->get('address_1');
        $this->address_2    = $data->get('address_2');
        $this->city         = $data->get('city');
        $this->zip          = $data->get('zip');
        $this->state_region = $data->get('region');
        $this->country_id   = $data->get('country');

        $this->save();

        return $this;
    }

    public function get($address_id)
    {
        return $this->where('id', $address_id)->get()->first();
    }

    public function get_by_user ($user_id) {
        return $this->where('user_id', $user_id)->get();
    }
}
