<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\MainCategory;
use App\Models\Service;

class MainCategoriesController extends BaseSiteController {

	public function show($slug){
		$category = ServiceCategory::findBySlug($slug);
		$services = $category->services()->paginate(10);
		return view('site.services.index', compact('services'));
	}
}
