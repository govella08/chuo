<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\AdministrationCategories;
use App\Models\Administration;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Response;
use Validator;
use Redirect;
use DB;

class AdministrationCategoriesController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = AdministrationCategories::orderBy('id', 'DESC')->get();
        return view('cms.administration_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.administration_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), AdministrationCategories::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $category = AdministrationCategories::create($request->only('title','has_label'));
        if(request('title_en')){
            $category->title=request('title_en');
            $category->save();
        }

        //due to conflict brought by two package working together translation and slugable you have to save slug again
        $category->slug=null;
        $slug = SlugService::createSlug(AdministrationCategories::class, 'slug', $request->title);
        $category->slug=$slug;
        //$category->has_label=request('has_label');
        app()->setLocale('en');
        $category->update();

        if($category){
            return redirect('cms/administration_categories');
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
        $category = AdministrationCategories::find($id);

        return view("cms.administration_categories.edit", compact('category'));
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
        $validator = Validator::make($request->all(), AdministrationCategories::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $category = AdministrationCategories::find($id);
        $category->update($request->only('title'));

        app()->setLocale('en');
        if(request('title_en')){
            $category->title=request('title_en');
            $category->save();
        }

        //due to conflict brought by two package working together translation and slugable you have to save slug again
        // $category->slug=null;
        // $slug = SlugService::createSlug(AdministrationCategories::class, 'slug', $request->title);
        // $category->slug=$slug;
        $category->has_label=request('has_label');
        //$category->update();

        if($category->save()){
            return redirect('cms/administration_categories');
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
        $category = AdministrationCategories::find($id);
        $category->administration()->delete();
        $category->delete();
        return redirect('cms/administration_categories');
    }

}
