<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\AdministrationGroups;
use App\Models\Administration;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Response;
use Validator;
use Redirect;
use DB;

class AdministrationGroupsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //request all administration groups
        $groups = AdministrationGroups::orderBy('id', 'DESC')->get();
        return view('cms.administration_groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create administration group
        return view('cms.administration_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), AdministrationGroups::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $group = AdministrationGroups::create($request->only('title'));
        app()->setLocale('en');
        if(request('title_en')){

            $group->title=request('title_en');
            $group->save();
        }

        //due to conflict brought by two package working together translation and slugable you have to save slug again
        $group->slug=null;
        $slug = SlugService::createSlug(AdministrationGroups::class, 'slug', $request->title);
        $group->slug=$slug;
        app()->setLocale('en');
        $group->update();

        if($group){
            return redirect('cms/administration_groups');
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
        //
        $group = AdministrationGroups::find($id);

        return view("cms.administration_groups.edit", compact('group'));
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
        //
        $validator = Validator::make($request->all(), AdministrationGroups::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $group = AdministrationGroups::find($id);
        $group->update($request->only('title'));

        app()->setLocale('en');
        if(request('title_en')){
            $group->title=request('title_en');
            $group->save();
        }

        if($group->save()){
            return redirect('cms/administration_groups');
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
        //
        $group = AdministrationGroups::find($id);
        $group->administration()->delete();
        $group->delete();
        return redirect('cms/administration_groups');
    }
}