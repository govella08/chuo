<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Speech;

class SpeechController extends BaseSiteController {

	public function index()
	{
		$speeches = Speech::orderBy('id', 'DESC')->where('active','=',1)->paginate(10);
        return view('site.speeches.index', compact('speeches'));
	}

}
