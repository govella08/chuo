<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Department;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class DepartmentsController extends BaseController {

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::orderBy('id', 'DESC')->get();
        return view('department.index', compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Department::$rules);
        $inputs = $request->only('dept_name', 'content','active');
        $department = Department::create($inputs);

        if(request('dept_name_en')){
            app()->setLocale('en');
            $department->dept_name=request('dept_name_en');
            $department->save();

         }

         if(request('content_en')){
            app()->setLocale('en');
            $department->content=request('content_en');
            $department->save();
         }

            $department->slug=null;

            $slug = SlugService::createSlug(Department::class, 'slug', $request->dept_name);
            $department->slug=$slug;

            $department->save();

        if($department){
            return redirect('cms/department');
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
        $department = Department::find($id);

        return view("department.edit", compact('department'));
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
        $request->validate(Department::$rules);
        $inputs = $request->only('dept_name', 'content','active');
        
        $department = Department::find($id);

        $department->update($inputs);

        if(request('dept_name_en')){
            app()->setLocale('en');
            $department->dept_name=request('dept_name_en');
            $department->save();

         }

         if(request('content_en')){
            app()->setLocale('en');
            $department->content=request('content_en');
            $department->save();
         }

            $department->slug=null;

            $slug = SlugService::createSlug(Department::class, 'slug', $request->dept_name);
            $department->slug=$slug;

            $department->save();

        return redirect('cms/department');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::destroy($id);

        return redirect('cms/department');
    }

}
