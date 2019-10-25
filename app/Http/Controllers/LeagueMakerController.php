<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeagueMakerController extends Controller
{
	public static function formater (){
		return view('pages.other.leagues');
	}

	public static function formater_show (Request $request) {
		$content = explode(PHP_EOL,$request->content);
		return view('pages.other.leagues', ['json' => json_encode($content,true)]);
	}

}
