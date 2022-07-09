<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Aboutus;

class AboutusController extends BaseSiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$aboutus = Aboutus::orderBy('id', 'DESC')->where('active','=',1)->paginate(4);
        return view('site.aboutus.index', compact('aboutus'));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$aboutus = Aboutus::findBySlug($slug);
		return view('site.aboutus.show', compact('aboutus'));
	}

	

}
