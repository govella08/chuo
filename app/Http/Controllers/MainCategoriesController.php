<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Models\MainCategory;
use App\Models\Services;

use DB;

class MainCategoriesController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $main_categories = MainCategory::orderBy('id', 'DESC')->get();
        //var_dump($main_categories); die();
        return view('main_categories.index', compact('main_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(MainCategory::$rules);

        $category = MainCategory::create($request->only('title','active'));

        if(request('title_en')){
            app()->setLocale('en');
            $category->title=request('title_en');
            $category->save();
         }

        $category->slug=null;

        $slug = SlugService::createSlug(MainCategory::class, 'slug', $request->title);
        $category->slug=$slug;
        app()->setLocale('en');

        $category->save();

        if($category){
            return redirect('cms/main_categories');
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
        $category = MainCategory::find($id);

        return view("main_categories.edit", compact('category'));
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
        $category = MainCategory::find($id);

        $request->validate(MainCategory::$rules);

        $category->update($request->only('title','active'));

        if(request('title_en')){
            app()->setLocale('en');
            $category->title=request('title_en');
            $category->save();
         }

        $category->slug=null;

        $slug = SlugService::createSlug(MainCategory::class, 'slug', $request->title);
        $category->slug=$slug;
        app()->setLocale('en');

        $category->save();

        if($category->update($request->all())){
            return redirect('cms/main_categories');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = MainCategory::find($id);
        $category->services()->delete();
        $category->delete();
        return redirect('cms/main_categories');
    }

}
