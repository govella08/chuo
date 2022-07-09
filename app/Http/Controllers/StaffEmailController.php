<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\StaffEmail;

use Response;
use Validator;
use Redirect;
use Auth;

class StaffEmailController extends BaseController {

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffemail = StaffEmail::orderBy('id', 'DESC')->first();
        return view('cms.staffemail.index', compact('staffemail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.staffemail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), StaffEmail::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $data['user_id']=Auth::user()->id;
        $StaffEmail = StaffEmail::create($data);

        if($StaffEmail){
            return redirect('cms/staffemail');
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
        $staffemail = StaffEmail::find($id);

        return view("cms.staffemail.edit", compact('staffemail'));
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
        $validator = Validator::make($data=$request->all(), StaffEmail::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $StaffEmail = StaffEmail::find($id);
        $data['user_id']=Auth::user()->id;
        if($StaffEmail->update($data)){
            return redirect('cms/staffemail');
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
        $StaffEmail = StaffEmail::destroy($id);

        return redirect('cms/staffemail');
    }

}
