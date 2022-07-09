<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\RelatedLink;
use App\Models\ExternalLink;


class ExternalLinksController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = ExternalLink::orderBy('id', 'DESC')->get();
        return view('external_links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('external_links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(ExternalLink::$rules);

        $link = ExternalLink::create($request->only('title'));
        if(request('title_en')){
            $link->title=request('title_en');
            $link->save();
        }

        if($link){
            return redirect('cms/external_links');
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
        $link = ExternalLink::find($id);

        return view("external_links.edit", compact('link'));
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
        $request->validate(ExternalLink::$rules);

        $link = ExternalLink::find($id);

        $link->update($request->only('title'));

        if(request('title_en')){
            $link->title=request('title_en');
            $link->save();
        }

        return redirect('cms/external_links');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = ExternalLink::destroy($id);

        return redirect('cms/external_links');
    }

}
