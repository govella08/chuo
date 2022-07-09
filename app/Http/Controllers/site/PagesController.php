<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Page;

use Response;


class PagesController extends BaseSiteController {




    /**
     * Display a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = Page::findBySlug($slug);
       // dd($page);
        if(!$page) abort(404);
        return view('site.pages.show', compact('page'));
    }

    

}
