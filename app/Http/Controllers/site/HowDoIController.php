<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\HowDoI;

class HowDoIController extends BaseSiteController {

	public function index()
	{		
		$howdois = HowDoI::orderBy('id', 'DESC')->where('active','=',1)->paginate(8);
        return view('site.howdois.index', compact('howdois'));
    }
	
	public function show($slug)
	{
		$howdois = HowDoI::where('slug','=',$slug)->first();
        return view('site.howdois.show', compact('howdois'));
	}


}
