<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\RelatedLink;


class RelatedLinksController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = RelatedLink::orderBy('id', 'DESC')->get();
        return view('cms.related_links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.related_links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(RelatedLink::$rules);

        $inputs = $request->except('title_en');

        $link = RelatedLink::create($inputs);

        if(request('title_en')){
            app()->setLocale('en');
            $link->title=request('title_en');
            $link->save();
        }

        return redirect('cms/related_links');

    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = RelatedLink::find($id);

        return view("cms.related_links.edit", compact('link'));
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
    
        $link = RelatedLink::find($id);

        $request->validate(RelatedLink::$rules);

        $inputs = $request->except('title_en');

        $link->update($inputs);

        if(request('title_en')){
            app()->setLocale('en');
            $link->title=request('title_en');
            $link->save();
        }

        return redirect('cms/related_links');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = RelatedLink::destroy($id);

        return redirect('cms/related_links');
    }

}
