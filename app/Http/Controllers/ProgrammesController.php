<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Programmes;
use App\Models\Level;

class ProgrammesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmes = Programmes::orderBy('id', 'DESC')->paginate(10);
        $levels = Level::pluck('name', 'id');
        return view('cms.programmes.index', compact('programmes','levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.programmes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Programmes::$rules);

        $data = $request->only('name','description','level_id');
        

        //$data['user_id'] = Auth::user()->id;
        $programmes = Programmes::create($data);

        if(request('name_en')){
            app()->setLocale('en');
            $programmes->name=request('name_en');
            $programmes->save();
        }
        if(request('description_en')){
            app()->setLocale('en');
            $programmes->description=request('description_en');
            $programmes->save();
        }

        $programmes->slugy=null;

        $slugy = SlugService::createSlug(programmes::class, 'slugy', $request->name);
        $programmes->slugy=$slugy;
        app()->setLocale('en');

        $programmes->update();

        if($programmes){
            return redirect('cms/programmes');
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
        $programmes = Programmes::find($id);
        $levels = Level::pluck('name', 'id');
        return view("cms.programmes.edit", compact('programmes', 'levels'));
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
        $programmes = Programmes::find($id);

        $rules = Programmes::$rules;

        $request->validate($rules);

        $data = $request->only('name','description','level_id');


        //$data['user_id'] = Auth::user()->id;
        $programmes->update($data);

        if(request('name_en')){
            app()->setLocale('en');
            $programmes->name=request('name_en');
            $programmes->save();
        }
        if(request('description_en')){
            app()->setLocale('en');
            $programmes->description=request('description_en');
            $programmes->save();
        }
        
        return redirect('cms/programmes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Programmes::destroy($id);

        return redirect('cms/programmes');
    }
}
