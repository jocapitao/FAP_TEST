<?php

namespace App\Http\Controllers;

use App\Validations;
use Illuminate\Http\Request;

class ValidationsController extends Controller
{
    public static function validate_currency ($id, $status = 1) {
	    try {
		    \DB::beginTransaction();
		    $get = Validations::get_currency($id,$status);
		    \DB::commit();

		    if(count($get)>0){
			return ['status'=>true];
		    }
		    return ['status'=>true];
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

    public static function validate_language ($id,$status = 1) {
	    try {
		    \DB::beginTransaction();
		    $get = Validations::get_language($id,$status);
		    \DB::commit();
		    if(count($get)>0){
			    return ['status'=>true];
		    }
		    return ['status'=>true];

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
