<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    public $table = 'fap_users_profile';

    public function get_profile ($user_id) {
        return $this->where('user_id',$user_id)->get();
    }
}
