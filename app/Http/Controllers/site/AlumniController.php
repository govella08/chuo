<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Alumni;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use \Waavi\Translation\Repositories\LanguageRepository;

class AlumniController extends BaseSiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnis = Alumni::orderBy('id', 'DESC')->paginate(10);
        return view('site.alumni.index', compact('alumnis'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slugy)
    {
        $alumnis = Alumni::findBySlug($slugy);
		return view('site.alumni.show', compact('alumnis'));
    }

}
