<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\PressRelease;

class PressReleaseController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pressreleases = PressRelease::orderBy('id', 'DESC')->paginate(15);
        return view('cms.pressreleases.index', compact('pressreleases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.pressreleases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate(PressRelease::$rules);

        $data = $request->except('file','file_en','title_en'); 
 
        if ($request->hasFile('file'))
        {

            if ($request->file('file')->isValid())
            {
                $file_url = $request->file('file');

                $doc_name = 'sw-'.time() . '-' .$file_url->getClientOriginalName();

                $pathName = '/uploads/pressreleases/';

                $destinationPath = public_path().$pathName;

                $file_url->move($destinationPath, $doc_name);

                $data['file'] = $pathName.$doc_name;

               /* $data['file_size'] = $request->file('file')->getClientSize();*/


            }
        }

        $pressrelease = PressRelease::create($data);

        if ($request->hasFile('file_en'))
		{

			if ($request->file('file_en')->isValid())
			{
			    $file_url_en = $request->file('file_en');

				$doc_name_en = 'en-'.time() . '-' .$file_url_en->getClientOriginalName();

				$pathName = '/uploads/pressreleases/';

				$destinationPath = public_path().$pathName;

				$file_url_en->move($destinationPath, $doc_name_en);

				/*$data['file'] = $pathName.$doc_name_en;*/
                
                $pressrelease->file=$pathName.$doc_name_en;
                app()->setLocale('en');
                $pressrelease->save();
            }
        }

        if(request('title_en')){
            app()->setLocale('en');
            $pressrelease->title=request('title_en');
            $pressrelease->save();
         }

       

        if($pressrelease){
            return redirect('cms/pressreleases');
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
        $pressrelease = PressRelease::find($id);
        return view("pressreleases.edit", compact('pressrelease'));
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
    	$pressrelease = PressRelease::find($id);

    	$rules = [
			'title' => 'required',
			'published_date' => 'required'
		];

        $request->validate($rules);

        $data = $request->except('file','file_en','title_en'); 

        $pressrelease->update($data);



        if ($request->hasFile('file'))
        {

            if ($request->file('file')->isValid())
            {
                $file_url = $request->file('file');

                $doc_name = 'sw-'.time() . '-' .$file_url->getClientOriginalName();

                $pathName = '/uploads/pressreleases/';

                $destinationPath = public_path().$pathName;

                $file_url->move($destinationPath, $doc_name);

                /*$data['file'] = $pathName.$doc_name;
                $data['file_size'] = $request->file('file')->getClientSize();*/

                if(is_file(public_path().$pressrelease->file) && file_exists(public_path().$pressrelease->file)){
                    unlink(public_path().$pressrelease->file);
                }

                $pressrelease->file=$pathName.$doc_name;
                $pressrelease->save();

            }
        }

        if ($request->hasFile('file_en'))
		{

			if ($request->file('file_en')->isValid())
			{
			    $file_url_en = $request->file('file_en');

				$doc_name_en = 'en-'.time() . '-' .$file_url_en->getClientOriginalName();

				$pathName = '/uploads/pressreleases/';

				$destinationPath = public_path().$pathName;

				$file_url_en->move($destinationPath, $doc_name_en);

				/*$data['file_en'] = $pathName.$doc_name_en;
                $data['file_size_en'] = $request->file('file_en')->getClientSize();*/


				if(is_file(public_path().$pressrelease->file_en) && file_exists(public_path().$pressrelease->file_en)){
					unlink(public_path().$pressrelease->file_en);
				}

                $pressrelease->file=$pathName.$doc_name_en;
                app()->setlocale('en');
                $pressrelease->save();
			}
		}

        if(request('title_en')){
            app()->setLocale('en');
            $pressrelease->title=request('title_en');
            $pressrelease->save();
         }

        return redirect('cms/pressreleases');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    	$pressrelease = PressRelease::find($id);

		if(is_file(public_path().$pressrelease->file_en) && file_exists(public_path().$pressrelease->file_en)){
			unlink(public_path().$pressrelease->file_en);
		}

		if(is_file(public_path().$pressrelease->file_sw) && file_exists(public_path().$pressrelease->file_sw)){
			unlink(public_path().$pressrelease->file_sw);
		}

		PressRelease::destroy($id);

        return redirect('cms/pressreleases');
    }

}
