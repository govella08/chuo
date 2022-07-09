<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\AcademicCampus;

class AcademicCampusController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = AcademicCampus::orderBy('id', 'DESC')->paginate(10);
        return view('cms.campuses.index', compact('campuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.campuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(AcademicCampus::$rules);

        $data = $request->only('name', 'summary','content');

        $campuses = AcademicCampus::create($data);

        if(request('name_en')){
            app()->setLocale('en');
            $campuses->name=request('name_en');
            $campuses->save();
         }

         if(request('summary_en')){
            app()->setLocale('en');
            $campuses->summary=request('summary_en');
            $campuses->save();
         }

         if(request('content_en')){
            app()->setLocale('en');
            $campuses->content=request('content_en');
            $campuses->save();
         }


        $campuses->slugy=null;

        $slugy = SlugService::createSlug(academicCampus::class, 'slugy', $request->name);
        $campuses->slugy=$slugy;
        app()->setLocale('en');

        $campuses->update();

        if($campuses){
            return redirect('cms/campuses');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campuses = AcademicCampus::find($id);
        return view("cms.campuses.edit", compact('campuses'));
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
        $campuses = AcademicCampus::find($id);
        //'flier'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        $rules=AcademicCampus::$rules;

        $request->validate($rules);

        $data = $request->only('name', 'summary','content');

        $campuses->update($data);

        if(request('name_en')){
            app()->setLocale('en');
            $campuses->name=request('name_en');
            $campuses->save();
         }

         if(request('summary_en')){
            app()->setLocale('en');
            $campuses->summary=request('summary_en');
            $campuses->save();
         }

         if(request('content_en')){
            app()->setLocale('en');
            $campuses->content=request('content_en');
            $campuses->save();
         }

        $campuses->slugy=null;

        $slugy = SlugService::createSlug(academicCampus::class, 'slugy', $request->name);
        $campuses->slugy=$slugy;
        app()->setLocale('en');

        $campuses->save();

        
        return redirect('cms/campuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AcademicCampus::destroy($id);

        return redirect('cms/campuses');
    }
}
