<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\MainCategory;

class ServicesController extends BaseSiteController {

	public function index()
	{		
		$services = Service::orderBy('id', 'DESC')->get();
        return view('site.services.index', compact('services'));
    }
	
	public function single_service($id)
	{
		$services = Service::where('id','=',$id)->first();
        return view('site.services.single', compact('services'));
	}


	public function show($id)
	{
		$services = Service::where('id','=',$id)->first();
        return view('site.services.show', compact('services'));
	}

}
