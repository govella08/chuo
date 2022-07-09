<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\GoogleMap;

use Response;
use Validator;
use Redirect;
use Auth;

class GoogleMapsController extends BaseController {

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $google_maps = GoogleMap::orderBy('id', 'DESC')->first();
        return view('google_maps.index', compact('google_maps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('google_maps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), GoogleMap::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $data['user_id']=Auth::user()->id;
        $GoogleMap = GoogleMap::create($request->all());

        if($GoogleMap){
            return redirect('cms/googlemaps');
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
        $google_maps = GoogleMap::find($id);

        return view("google_maps.edit", compact('google_maps'));
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
        $validator = Validator::make($data=$request->all(), GoogleMap::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $GoogleMap = GoogleMap::find($id);
         $data['user_id']=Auth::user()->id;
        if($GoogleMap->update($data)){
            return redirect('cms/googlemaps');
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
        $GoogleMap = GoogleMap::destroy($id);

        return redirect('cms/googlemaps');
    }

}
