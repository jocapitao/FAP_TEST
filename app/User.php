<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	        'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
	        'password', 'remember_token',
	];

	protected $table = 'fap_users';

	public function get_user_info($user_id) {
        return $this->select('name', 'username')->where('id',$user_id)->get()->first();
    }

    public function get_user ($user_id) {
        return $this->where('id',$user_id)->get()->first();
    }

    public function get_users () {
	    return $this->select('id','name','username','email','inserted_at','status')->get();
    }
}