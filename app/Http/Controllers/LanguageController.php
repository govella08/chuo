<?php namespace App\Http\Controllers;

use Cookie;
use Redirect;

class LanguageController extends BaseController {


	public function change($lang){

	$lang = Cookie::make('lang', '_'.$lang);

 	return Redirect::back()->withCookie($lang);

	}

}

