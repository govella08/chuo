<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\QuickLink;

use Response;
use Validator;
use Redirect;

class QuickLinksController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = QuickLink::orderBy('id', 'DESC')->get();
        return view('cms.quick_links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.quick_links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(QuickLink::$rules);

        $inputs = $request->except('title_en');

        $link = QuickLink::create($inputs);
        if(request('title_en')){
            app()->setLocale('en');
            $link->title=request('title_en');
            $link->save();
        }

        if($link){
            return redirect('cms/quick_links');
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
        $link = QuickLink::find($id);

        return view("cms.quick_links.edit", compact('link'));
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
        $request->validate(QuickLink::$rules);

        $link = QuickLink::find($id);

        $inputs = $request->except('title_en');

        $link->update($inputs);

        if(request('title_en')){
            app()->setLocale('en');
            $link->title=request('title_en');
            $link->save();
        }        

        return redirect('cms/quick_links');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = QuickLink::destroy($id);

        return redirect('cms/quick_links');
    }

}
