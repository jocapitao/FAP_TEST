<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public static function get_currency_list () {
	    try {
		    \DB::beginTransaction();
		    $get = Site::get_currencies();
		    \DB::commit();
		    if(count($get) > 0){
		    	return $get;
		    }
		    return ['Could not get currencies!'];
	    } catch (\Illuminate\Database\QueryException $e) {
		    \DB::rollback();
		    //return message
		    return ['status' => false, 'e' => $e];
	    } catch (\Exception $e) { #error occurred
		    \DB::rollback();
		    //return message
		    return ['status' => false, 'e' => $e];
	    }
    }

    public static function get_languages_list () {
	    try {
		    \DB::beginTransaction();
		    $get = Site::get_languages();
		    \DB::commit();
		    if(count($get) > 0){
		    	return $get;
		    }
		    return ['Could not get languages!'];
	    } catch (\Illuminate\Database\QueryException $e) {
		    \DB::rollback();
		    //return message
		    return ['status' => false, 'e' => $e];
	    } catch (\Exception $e) { #error occurred
		    \DB::rollback();
		    //return message
		    return ['status' => false, 'e' => $e];
	    }
    }
}
