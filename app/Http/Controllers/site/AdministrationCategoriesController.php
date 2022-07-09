<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\AdministrationCategories;
use App\Models\Administration;

class AdministrationCategoriesController extends BaseSiteController {

	public function show($slug){
		$category = AdministrationCategories::findBySlug($slug);
		$administration = $category->administration();
		return view('site.administration.index', compact('administration','category'));
	}
}
