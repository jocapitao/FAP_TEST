<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserMedia extends Model
{
    public $table = "fap_media_profile";
    protected $fillable = [
        'media_id', 'user_id', 'status'
    ];

    public function get_media($user_id)
    {
        return $this->select('media_id')->where('user_id',$user_id)->get();
//        return $this->get();
    }
}
