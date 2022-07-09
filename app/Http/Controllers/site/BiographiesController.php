<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Biography;
use App\Models\Announcement;

class BiographiesController extends BaseSiteController {

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $biography = Biography::findBySlug($slug);
        
        /*$biography = ($biography)?$biography:new Biography;
        $biography->photourl = ($biography->photourl)?$biography->photourl:'/cms/images/person.png';*/
        return view('site.biographies.show',compact('biography')); 
    }




}