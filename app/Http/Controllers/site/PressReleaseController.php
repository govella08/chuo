<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\PressRelease;

class PressReleaseController extends BaseSiteController {

	public function index()
	{
		$pressreleases = PressRelease::orderBy('id', 'DESC')->where('active','=',1)->paginate(14);
        return view('site.pressreleases.index', compact('pressreleases'));
	}

}
