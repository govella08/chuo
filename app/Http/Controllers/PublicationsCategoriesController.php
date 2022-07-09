<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\PublicationCategory;
use App\Models\Publication;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use DB;

class PublicationsCategoriesController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PublicationCategory::orderBy('id', 'DESC')->get();
        return view('cms.publication_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.publication_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(PublicationCategory::$rules);

        $data = $request->except('title_en');

        $category = PublicationCategory::create($data);

        if(request('title_en')){
            app()->setLocale('en');
            $category->title=request('title_en');
            $category->save();
        }


        $category->slug=null;
        $slug = SlugService::createSlug(PublicationCategory::class, 'slug', $request->title);
        $category->slug=$slug;
        $category->save();

        if($category){
            return redirect('cms/publication_categories');
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
        $category = PublicationCategory::find($id);

        return view("cms.publication_categories.edit", compact('category'));
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
        $request->validate(PublicationCategory::$rules);

        $data = $request->except('title_en');

        $category = PublicationCategory::find($id);

        $category->update($data);

        if(request('title_en')){
            app()->setLocale('en');
            $category->title=request('title_en');
            $category->save();
        }


        $category->slug=null;
        $category->save();
        $slug = SlugService::createSlug(PublicationCategory::class, 'slug', $request->title);
        $category->slug=$slug;
        $category->save();
        
        
        return redirect('cms/publication_categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = PublicationCategory::find($id);
        $publication = Publication::where('category_id','=',$id)->get();
        foreach($publication as $publication){
            if(is_file(public_path().$publication->file_en) && file_exists(public_path().$publication->file_en)){
                unlink(public_path().$publication->file_en);
            }

            if(is_file(public_path().$publication->file_sw) && file_exists(public_path().$publication->file_sw)){
                unlink(public_path().$publication->file_sw);
            }
        }
        $category->publications()->delete();
        $category->delete();


        return redirect('cms/publication_categories');
    }

}
