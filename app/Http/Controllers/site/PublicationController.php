<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\PublicationCategory;
class PublicationController extends BaseSiteController {

	public function index()
	{
		$publications = Publication::orderBy('id', 'DESC')->where('active','=',1)->paginate(14);
        return view('site.publications.index', compact('publications'));
	}
	public function show($id)
	{
		$publications;
		$category = PublicationCategory::find($id);
		if ($category) {
			$publications = Publication::where('category_id','=',$category->id)->orderBy('id', 'DESC')->where('active','=',1)->paginate(14);
		}else{
			$publications = Publication::orderBy('id', 'DESC')->where('active','=',1)->paginate(14);
		}
		
        return view('site.publications.index', compact('publications'));
	}

}
