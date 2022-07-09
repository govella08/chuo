<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\PublicationCategory;
use App\Models\Publication;

class PublicationCategoriesController extends BaseSiteController {

	public function show($slug){
		$category = PublicationCategory::findBySlug($slug);
		$publications = $category->publications()->paginate(10);
		return view('site.publications.index', compact('publications'));
	}
}
