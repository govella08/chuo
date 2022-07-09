<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Unit;


class UnitsController extends BaseController {

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Unit::orderBy('id', 'DESC')->get();
        return view('unit.index', compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Unit::$rules);

        $inputs = $request->except('dept_name_en', 'content_en');

        $unit = Unit::create($inputs);

         if(request('dept_name_en')){
            app()->setLocale('en');
            $unit->dept_name=request('dept_name_en');
            $unit->save();
         }


         if(request('content_en')){
            app()->setLocale('en');
            $unit->content=request('content_en');
            $unit->save();
         }

        return redirect('cms/unit');
      
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Unit::find($id);

        return view("unit.edit", compact('department'));
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
        $unit = Unit::find($id);

        $request->validate(Unit::$rules);

        $inputs = $request->except('dept_name_en', 'content_en');

        $unit->update($inputs);

        if(request('dept_name_en')){
            app()->setLocale('en');
            $unit->dept_name=request('dept_name_en');
            $unit->save();
        }

        if(request('content_en')){
            app()->setLocale('en');
            $unit->content=request('content_en');
            $unit->save();
        }

        return redirect('cms/unit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Unit::destroy($id);

        return redirect('cms/unit');
    }

}
