<?php

namespace App\Http\Controllers\site;

use App\Highlight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HighlightsController extends BaseSiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $highlights = Highlight::orderBy('id', 'DESC')->where('active','=',1)->paginate(6);
        return view('site.highlights.index', compact('highlights'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $highlight = Highlight::find($id);
        return view('site.highlights.show', compact('highlight'));
    }
}
