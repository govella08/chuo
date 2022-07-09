<?php

namespace App\Http\Controllers;

use App\Highlight;
use App\Http\Controllers\site\BaseSiteController;
use Illuminate\Http\Request;

class HighlightsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $highlights = Highlight::orderBy('id', 'DESC')->paginate(15);
        return view('cms.highlights.index', compact('highlights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.highlights.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(Highlight::$rules);

        $data = $request->except('title_en','content_en');

        $highlight = Highlight::create($data);

        if(request('title_en')){
            app()->setLocale('en');
            $highlight->title=request('title_en');
            $highlight->save();

        }

        if(request('content_en')){
            app()->setLocale('en');
            $highlight->content=request('content_en');
            $highlight->save();
        }


        if($highlight){
            return redirect('cms/highlights');
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
        $highlight = Highlight::find($id);
        return view("cms.highlights.edit", compact('highlight'));
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
        $highlight = Highlight::find($id);

        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];

        $request->validate($rules);

        $data = $request->except('title_en','content_en');

        $highlight->update($data);

        if(request('title_en')){
            app()->setLocale('en');
            $highlight->title=request('title_en');
            $highlight->save();

        }

        if(request('content_en')){
            app()->setLocale('en');
            $highlight->content=request('content_en');
            $highlight->save();
        }

        return redirect('cms/highlights');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $highlight = Highlight::find($id);

        Highlight::destroy($id);

        return redirect('cms/highlights');
    }
}
