<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Speech;

use Image;


class SpeechesController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speeches = Speech::orderBy('id', 'DESC')->paginate(15);
        return view('cms.speeches.index', compact('speeches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.speeches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	
        $request->validate(Speech::$rules);

        $data = $request->except('file','file_en','title_en','content_en'); 
 
        if ($request->hasFile('file'))
        {

            if ($request->file('file')->isValid())
            {
                $file_url = $request->file('file');

                $doc_name = 'sw-'.time() . '-' .$file_url->getClientOriginalName();

                $pathName = '/uploads/speeches/docs/';

                $destinationPath = public_path().$pathName;

                $file_url->move($destinationPath, $doc_name);

                $data['file'] = $pathName.$doc_name;

               /* $data['file_size'] = $request->file('file')->getClientSize();*/


            }
        }

        $speech = Speech::create($data);

        if ($request->hasFile('file_en'))
        {

            if ($request->file('file_en')->isValid())
            {
                $file_url_en = $request->file('file_en');

                $doc_name_en = 'en-'.time() . '-' .$file_url_en->getClientOriginalName();

                $pathName = '/uploads/speeches/docs/';

                $destinationPath = public_path().$pathName;

                $file_url_en->move($destinationPath, $doc_name_en);

                /*$data['file'] = $pathName.$doc_name_en;*/
                
                $speech->file=$pathName.$doc_name_en;
                app()->setLocale('en');
                $speech->save();
            }
        }

        if(request('title_en')){
            app()->setLocale('en');
            $speech->title=request('title_en');
            $speech->save();

         }

         if(request('content_en')){
            app()->setLocale('en');
            $speech->content=request('content_en');
            $speech->save();
         }
       

        if($speech){
            return redirect('cms/speeches');
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
        $speech = Speech::find($id);
        return view("cms.speeches.edit", compact('speech'));
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
    	$speech = Speech::find($id);

    	$rules = [
			'title' => 'required',
			'published_date' => 'required'
		];

        $request->validate($rules);

        $data = $request->except('file','file_en','title_en','content_en');

        $speech->update($data);



        if ($request->hasFile('file'))
        {

            if ($request->file('file')->isValid())
            {
                $file_url = $request->file('file');

                $doc_name = 'sw-'.time() . '-' .$file_url->getClientOriginalName();

                $pathName = '/uploads/speeches/docs/';

                $destinationPath = public_path().$pathName;

                $file_url->move($destinationPath, $doc_name);

                /*$data['file'] = $pathName.$doc_name;
                $data['file_size'] = $request->file('file')->getClientSize();*/

                if(file_exists(public_path().'/uploads/speeches/docs/'.__($speech->file,[],'sw'))){
                    unlink(public_path().'/uploads/speeches/docs/'.__($speech->file,[],'sw'));
                }

                $speech->file=$pathName.$doc_name;
                $speech->save();

            }
        }

        if ($request->hasFile('file_en'))
        {

            if ($request->file('file_en')->isValid())
            {
                $file_url_en = $request->file('file_en');

                $doc_name_en = 'en-'.time() . '-' .$file_url_en->getClientOriginalName();

                $pathName = '/uploads/speeches/docs/';

                $destinationPath = public_path().$pathName;

                $file_url_en->move($destinationPath, $doc_name_en);

                /*$data['file_en'] = $pathName.$doc_name_en;
                $data['file_size_en'] = $request->file('file_en')->getClientSize();*/


                if(file_exists(public_path().'/uploads/speeches/docs/'.__($speech->file,[],'en'))){
                    unlink(public_path().'/uploads/speeches/docs/'.__($speech->file,[],'en'));
                }

                $speech->file=$pathName.$doc_name_en;
                app()->setlocale('en');
                $speech->save();
            }
        }

        if(request('title_en')){
            app()->setLocale('en');
            $speech->title=request('title_en');
            $speech->save();

         }

         if(request('content_en')){
            app()->setLocale('en');
            $speech->content=request('content_en');
            $speech->save();
         }

        return redirect('cms/speeches');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    	$speech = Speech::find($id);

		if(file_exists(public_path().'/uploads/speeches/docs/'.__($speech->file,[],'en'))){
			unlink(public_path().'/uploads/speeches/docs/'.__($speech->file,[],'en'));
		}

		if(file_exists(public_path().'/uploads/speeches/docs/'.__($speech->file,[],'sw'))){
			unlink(public_path().'/uploads/speeches/docs/'.__($speech->file,[],'sw'));
		}

		Speech::destroy($id);

        return redirect('cms/speeches');
    }

}
