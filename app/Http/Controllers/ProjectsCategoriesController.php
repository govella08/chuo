<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Project;

use DB;

class ProjectsCategoriesController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProjectCategory::orderBy('id', 'DESC')->get();
        return view('cms.project_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.project_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(ProjectCategory::$rules);

        $inputs = $request->except('title_en');

        $category = ProjectCategory::create($inputs);

        if(request('title_en')){
            app()->setLocale('en');
            $category->title=request('title_en');
            $category->save();
        }

        $category->slug=null;
        $slug = SlugService::createSlug(ProjectCategory::class, 'slug', $request->title);
        $category->slug=$slug;

        $category->save();
        

        if($category){
            return redirect('cms/project_categories');
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ProjectCategory::find($id);

        return view("cms.project_categories.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $request->validate(ProjectCategory::$rules);

     $inputs = $request->except('title_en');

     $category = ProjectCategory::find($id);

     $category->update($inputs);

     if(request('title_en')){
        app()->setLocale('en');
        $category->title=request('title_en');
        $category->save();
    }

    // $category->slug=null;
    // $category->save();
    // $slug = SlugService::createSlug(ProjectCategory::class, 'slug', $request->title);
    // $category->slug=$slug;

    $category->save();
    
    return redirect('cms/project_categories');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ProjectCategory::find($id);
        $project = Project::where('category_id','=',$id)->get();
        if($project->count()>0){
            foreach($project as $project){
                if(is_file(public_path().$project->file_en) && file_exists(public_path().$project->file_en)){
                    unlink(public_path().$project->file_en);
                }

                if(is_file(public_path().$project->file_sw) && file_exists(public_path().$project->file_sw)){
                    unlink(public_path().$project->file_sw);
                }
            }
        }
        $category->projects()->delete();
        $category->delete();


        return redirect('cms/project_categories');
    }

}
