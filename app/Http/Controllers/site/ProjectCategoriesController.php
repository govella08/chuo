<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Models\Project;

class ProjectCategoriesController extends BaseSiteController {

	public function show($slug){
		$category = ProjectCategory::findBySlug($slug);
		$projects = $category->projects()->paginate(10);
		return view('site.projects.index', compact('projects'));
	}
}
