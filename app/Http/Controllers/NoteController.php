<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Note;
use Validator;
use Redirect;

class NoteController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $notes= Note::all()->first();
        $notes= ($notes)?$notes:new Note();
        $notes->photourl = ($notes->photourl)?$notes->photourl:'/cms/images/person.png';
        return view('notes.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $note= new Note();
        $note= Note::all()->first();
        $note= ($note)?$note:new Note;
        return view('notes.create',compact('notes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($data = $request->all(), Note::$rules);

        if ($validator->fails())
        {

            return Redirect::back()->withErrors($validator)->withInput();
        }

        $note= Note::all()->first();
        $note= ($note)?$note:new Note;
        $note->fill($data);
        $note->save();

        return Redirect::route('cms.notes.index');
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
        return view('notes.show',compact('notes')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    public function photoUpload(Request $request){

        $validator = Validator::make($data = $request->all(), ['photourl'=>Note::$rules['photourl']]);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $note =  Note::all()->first();
        if( $note && $request->hasFile('photourl') ){

            //deleting if there is file
            if(file_exists(public_path().$note->photourl) && is_file(public_path().$note->photourl)){
                unlink(public_path().$note->photourl);
            }

            $imgUrl =$request->file('photourl');
            $filename = 'note_'.time() . '-' .$imgUrl->getClientOriginalName();
            $imgUrl->move(public_path().'/uploads/note/', $filename);
            $note->photourl = '/uploads/note/'.$filename;
            $note->update(); 
        }
      
      return redirect()->back();


    


    }
}
