<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\PublicationCategory;

use Auth;
class PublicationsController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::orderBy('id', 'DESC')->paginate(15);
        $categories = PublicationCategory::pluck('title', 'id');
        return view('cms.publications.index', compact('publications', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.publications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate(Publication::$rules);

        $data = $request->except('title_en', 'file_en','file');
        //$data['user_id'] = Auth::user()->id;
        if ($request->hasFile('file'))
        {

            if ($request->file('file')->isValid())
            {
                $file_url_sw = $request->file('file');

                $doc_name_sw = 'sw-'.time() . '-' .$file_url_sw->getClientOriginalName();

                $pathName = '/uploads/publications/';

                $destinationPath = public_path().$pathName;

                $file_url_sw->move($destinationPath, $doc_name_sw);

                $data['file'] = $pathName.$doc_name_sw;

            }
        }

        $publication = Publication::create($data);

        if ($request->hasFile('file_en'))
        {

            if ($request->file('file_en')->isValid())
            {
                $file_url_en = $request->file('file_en');

                $doc_name_en = 'en-'.time() . '-' .$file_url_en->getClientOriginalName();

                $pathName = '/uploads/publications/';

                $destinationPath = public_path().$pathName;

                $file_url_en->move($destinationPath, $doc_name_en);

                app()->setLocale('en');
                $publication->file=$pathName.$doc_name_en;
                $publication->save();

            }
        }

        if(request('title_en')){
            app()->setLocale('en');
            $publication->title=request('title_en');
            $publication->save();
        }
        

        if($publication){
            return redirect('cms/publications');
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
        $publication = Publication::find($id);
        $categories = PublicationCategory::pluck('title', 'id');
        return view("cms.publications.edit", compact('publication', 'categories'));
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
    	$publication = Publication::find($id);

    	$rules = [
         'title' => 'required',
         'published_date' => 'required'
     ];

     $request->validate($rules);

     $data = $request->except('title_en', 'file_en','file');

     $publication->update($data);

     if ($request->hasFile('file'))
     {

        if ($request->file('file')->isValid())
        {
            $file_url_sw = $request->file('file');

            $doc_name_sw = 'sw-'.time() . '-' .$file_url_sw->getClientOriginalName();

            $pathName = '/uploads/publications/';

            $destinationPath = public_path().$pathName;

            $file_url_sw->move($destinationPath, $doc_name_sw);

            if(is_file(public_path().$publication->file) && file_exists(public_path().$publication->file)){
                unlink(public_path().$publication->file);
            }

            $publication->file=$pathName.$doc_name_sw;
            $publication->save();

        }
    }

    if ($request->hasFile('file_en'))
    {

        if ($request->file('file_en')->isValid())
        {
            $file_url_en = $request->file('file_en');

            $doc_name_en = 'en-'.time() . '-' .$file_url_en->getClientOriginalName();


            $pathName = '/uploads/publications/';

            $destinationPath = public_path().$pathName;

            $file_url_en->move($destinationPath, $doc_name_en);

            if(is_file(public_path().$publication->file_en) && file_exists(public_path().$publication->file_en)){
                unlink(public_path().$publication->file_en);
            }

            app()->setLocale('en');
            $publication->file=$pathName.$doc_name_en;
            $publication->save();

        }
    }

    if(request('title_en')){
        app()->setLocale('en');
        $publication->title=request('title_en');
        $publication->save();
    }

    return redirect('cms/publications');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    	$publication = Publication::find($id);

      if(is_file(public_path().__($publication->file_translation,[],'en')) && file_exists(public_path().__($publication->file_translation,[],'en'))){
         unlink(public_path().__($publication->file_translation,[],'en'));
     }
     if(is_file(public_path().$publication->file) && file_exists(public_path().$publication->file)){
         unlink(public_path().$publication->file);
     }

     Publication::destroy($id);

     return redirect('cms/publications');
 }

}
