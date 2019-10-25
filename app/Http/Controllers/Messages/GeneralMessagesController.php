<?php

namespace App\Http\Controllers\Messages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralMessagesController extends Controller
{
    public static function profile_forms_simple_info () {
    	return [
    	        'first_name_input.required' => trans('profile.profile_first_name_required'),
    	        'last_name_input.required' => trans('profile.profile_last_name_required'),
	];
    }

    public static function profile_forms_description () {
    	return [
    	        'description_input.required' => trans('profile.profile_description_required')
	];
    }
}
