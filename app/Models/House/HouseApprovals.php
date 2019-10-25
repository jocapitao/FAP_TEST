<?php

namespace App\Models\House;

use Illuminate\Database\Eloquent\Model;

class HouseApprovals extends Model
{
    public $table = 'fap_houses_to_approve';
    protected $fillable = [
            'id_house', 'house_status', 'user_id_approval'
    ];
}
