<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectCategory;
class ProjectController extends BaseSiteController {

	public function index()
	{
		$projects = Project::orderBy('id', 'DESC')->where('active','=',1)->paginate(14);
		return view('site.projects.index', compact('projects'));
	}
	public function show($id)
	{
		$category = ProjectCategory::find($id);
		$projects = Project::where('category_id','=',$category->id)->orderBy('id', 'DESC')->paginate(14);
		return view('site.projects.index', compact('projects'));
	}

	public function single($slug){
		$project = Project::findBySlug($slug);
		return view('site.projects.single', compact('project'));
	}

}
