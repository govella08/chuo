<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectCategory;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Auth;

class ProjectsController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'DESC')->paginate(15);
        $categories = ProjectCategory::pluck('title', 'id');
        return view('cms.projects.index', compact('projects', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(Project::$rules);

        $data = $request->except('title_en', 'duration_en','content_en','file_en','file');


        if ($request->hasFile('file'))
        {

            if ($request->file('file')->isValid())
            {
                $file_url_sw = $request->file('file');

                $doc_name_sw = 'sw-'.time() . '-' .$file_url_sw->getClientOriginalName();

                $pathName = '/uploads/projects/';

                $destinationPath = public_path().$pathName;

                $file_url_sw->move($destinationPath, $doc_name_sw);

                $data['file'] = $pathName.$doc_name_sw;

            }
        }

        $project = Project::create($data);

        if ($request->hasFile('file_en'))
        {

            if ($request->file('file_en')->isValid())
            {
             $file_url_en = $request->file('file_en');

             $doc_name_en = 'en-'.time() . '-' .$file_url_en->getClientOriginalName();


             $pathName = '/uploads/projects/';

             $destinationPath = public_path().$pathName;

             $file_url_en->move($destinationPath, $doc_name_en);

             app()->setLocale('en');
             $project->file=$pathName.$doc_name_en;
             $project->save();

         }
     }

     if(request('title_en')){
        app()->setLocale('en');
        $project->title=request('title_en');
        $project->save();
    }

    if(request('duration_en')){

        app()->setLocale('en');
        $project->duration=request('duration_en');
        $project->save();
    }

    if(request('content_en')){
        app()->setLocale('en');
        $project->content=request('content_en');
        $project->save();
    }

    $project->slug=null;
    $slug = SlugService::createSlug(project::class, 'slug', $request->title);
    $project->slug=$slug;
    $project->save();


    if($project){
        return redirect('cms/projects');
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
        $project = Project::find($id);
        $categories = ProjectCategory::pluck('title', 'id');
        return view("cms.projects.edit", compact('project', 'categories'));
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
    	$project = Project::find($id);

        $rules=Project::$rules;

        $rules['file']='';

        $request->validate($rules);

        $data = $request->except('title_en', 'duration_en','content_en','file_en','file');

        $project->update($data);

        if ($request->hasFile('file'))
        {

            if ($request->file('file')->isValid())
            {
                $file_url_sw = $request->file('file');

                $doc_name_sw = 'sw-'.time() . '-' .$file_url_sw->getClientOriginalName();

                $pathName = '/uploads/projects/';

                $destinationPath = public_path().$pathName;

                $file_url_sw->move($destinationPath, $doc_name_sw);

                $data['file_sw'] = $pathName.$doc_name_sw;

                if(is_file(public_path().$project->file_sw) && file_exists(public_path().$project->file_sw)){
                    unlink(public_path().$project->file_sw);
                }

                $project->file=$pathName.$doc_name_sw;
                $project->save();
            }
        }

        if ($request->hasFile('file_en'))
        {

            if ($request->file('file_en')->isValid())
            {
                $file_url_en = $request->file('file_en');

                $doc_name_en = 'en-'.time() . '-' .$file_url_en->getClientOriginalName();

                $pathName = '/uploads/projects/';

                $destinationPath = public_path().$pathName;

                $file_url_en->move($destinationPath, $doc_name_en);

                if(is_file(public_path().$project->file_en) && file_exists(public_path().$project->file_en)){
                    unlink(public_path().$project->file_en);
                }

                app()->setLocale('en');
                $project->file=$pathName.$doc_name_en;
                $project->save();
                //$data['file_en'] = $pathName.$doc_name_en;

            }
        }

        if(request('title_en')){
            app()->setLocale('en');
            $project->title=request('title_en');
            $project->save();
        }

        if(request('duration_en')){

            app()->setLocale('en');
            $project->duration=request('duration_en');
            $project->save();
        }

        if(request('content_en')){
            app()->setLocale('en');
            $project->content=request('content_en');
            $project->save();
        }

        // $project->slug=null;
        // $project->save();
        // $slug = SlugService::createSlug(project::class, 'slug', $request->title);
        // $project->slug=$slug;
        $project->save();

        return redirect('cms/projects');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    	$project = Project::find($id);

      if(is_file(public_path().$project->file_en) && file_exists(public_path().$project->file_en)){
         unlink(public_path().$project->file_en);
     }

     if(is_file(public_path().$project->file_sw) && file_exists(public_path().$project->file_sw)){
         unlink(public_path().$project->file_sw);
     }

     Project::destroy($id);

     return redirect('cms/projects');
 }

}
