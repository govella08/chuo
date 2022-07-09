<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Programmes;
use App\Models\Level;

class ProgrammesController extends BaseSiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmes = Programmes::orderBy('id', 'DESC')->paginate(10);
        $levels = Level::pluck('name', 'id');
        return view('cms.programmes.index', compact('programmes','levels'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slugy)
    {
        $programmes = Programmes::findBySlug($slugy);
		return view('site.programmes.show', compact('programmes'));
    }

    
}
