<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\GoogleAnalytic;
use Auth;

class GoogleAnalyticsController extends BaseController {

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
        $googleanalytics = GoogleAnalytic::orderBy('id', 'DESC')->first();
        return view('cms.googleanalytics.index', compact('googleanalytics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.googleanalytics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(GoogleAnalytic::$rules);

        //dd($request->all());
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        
        $GoogleAnalytic = GoogleAnalytic::create($data);

        if($GoogleAnalytic){
            return redirect('cms/googleanalytics');
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
        $googleanalytics = GoogleAnalytic::find($id);

        return view("cms.googleanalytics.edit", compact('googleanalytics'));
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
     $request->validate(GoogleAnalytic::$rules);

     $GoogleAnalytic = GoogleAnalytic::find($id);
     if($GoogleAnalytic->update($request->all())){
        return redirect('cms/googleanalytics');
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
        $GoogleAnalytic = GoogleAnalytic::destroy($id);

        return redirect('cms/googleanalytics');
    }

}
