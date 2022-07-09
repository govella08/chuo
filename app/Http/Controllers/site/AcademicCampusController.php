<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\AcademicCampus;

class AcademicCampusController extends BaseSiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = AcademicCampus::orderBy('id', 'DESC')->paginate(10);
        return view('cms.campuses.index', compact('campuses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slugy)
    {
        $campuses = AcademicCampus::findBySlug($slugy);
		return view('site.campuses.show', compact('campuses'));
    }

    
}
