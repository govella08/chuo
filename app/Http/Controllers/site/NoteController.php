<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Announcement;

class NoteController extends BaseSiteController {

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {        
        $notes = Note::orderBy('id', 'DESC')->get();
        //$notes = ($notes)?$notes:new Note;
        //$notes->photourl = ($notes->photourl)?$notes->photourl:'/cms/images/person.png';
        return view('site.notes.show',compact('notes')); 
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $notes = Note::findBySlug($slug);
        $notes = ($notes)?$notes:new Note;
        $notes->photourl = ($notes->photourl)?$notes->photourl:'/cms/images/person.png';
        return view('site.notes.show',compact('notes')); 
    }




}