<?php

namespace App\Http\Controllers\Currency;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\Currencies;

class CurrencyController extends Controller
{
    public static function cache_currencies () {
	    if(!Cache::has('currencies')){
		    Cache::put( 'currencies', Currencies::select(['id','currency_name','currency_3','currency_symbol'])->get()->toArray(), 1 );
	    }
    }

    public static function get_currency ($currency_id) {
    	$get = Currencies::where('id',$currency_id)->get()->first();
    	return $get;
    }
}
