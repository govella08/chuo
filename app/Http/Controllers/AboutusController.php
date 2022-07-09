<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Aboutus;

use Response;
use Validator;
use Redirect;
use Image;

class AboutusController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutus = Aboutus::orderBy('id', 'DESC')->paginate(7);
        return view('aboutus.index', compact('aboutus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aboutus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($data = $request->all(), Aboutus::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if($request->hasFile('photo_url')){
        	if($request->file('photo_url')->isValid()){

        		$file = $request->file('photo_url');

				$name = time(). '-' .$file->getClientOriginalName();

				$file->move(public_path().'/uploads/aboutus/', $name);

				$img = Image::make(public_path().'/uploads/aboutus/'.$name);

				$img->backup();
				$img->fit(120, 80, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();

                });

                $thumb_path = public_path().'/uploads/aboutus/thumb-'.$name;
                $img->save($thumb_path);
                $img->reset();

                $img->fit(260, 180, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $medium_path = public_path().'/uploads/aboutus/medium-'.$name;
                $img->save($medium_path);
                $img->reset();



                $img->fit(800, 420, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $large_path = public_path().'/uploads/aboutus/large-'.$name;
                $img->save($large_path);

		        $data['photo_url'] = $name;

        	}
        }

        $aboutus = Aboutus::create($data);

        if($aboutus){
            return redirect('cms/aboutus');
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
        $aboutus = Aboutus::find($id);

        return view("aboutus.edit", compact('aboutus'));
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
        $aboutus = Aboutus::find($id);

    	$rules = Aboutus::$rules;

    	$rules['photo_url'] = 'mimes:jpg,png,jpeg,bmp|max:2000';

        $validator = Validator::make($data=$request->all(), $rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }


        if($request->hasFile('photo_url')){
        	if($request->file('photo_url')->isValid()){

        		$file = $request->file('photo_url');

				$name = time(). '-' .$file->getClientOriginalName();

				$file->move(public_path().'/uploads/aboutus/', $name);

				$img = Image::make(public_path().'/uploads/aboutus/'.$name);

				$img->backup();
				$img->fit(120, 80, function ($constraint) {

				    $constraint->aspectRatio();
				    $constraint->upsize();

				});

				$thumb_path = public_path().'/uploads/aboutus/thumb-'.$name;
				$img->save($thumb_path);
				$img->reset();

				$img->fit(260, 180, function ($constraint) {
				    $constraint->aspectRatio();
				    $constraint->upsize();
				});
				$medium_path = public_path().'/uploads/aboutus/medium-'.$name;
				$img->save($medium_path);
                $img->reset();



                $img->fit(800, 420, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $large_path = public_path().'/uploads/aboutus/large-'.$name;
                $img->save($large_path);

		        $data['photo_url'] = $name;

		        if(is_file(public_path().'/uploads/aboutus/'.$aboutus->photo_url) and file_exists(public_path().'/uploads/aboutus/'.$aboutus->photo_url)){
					unlink(public_path().'/uploads/aboutus/'.$aboutus->photo_url);
		        }
			   
			    if(is_file(public_path().'/uploads/aboutus/thumb-'.$aboutus->photo_url) and file_exists(public_path().'/uploads/aboutus/thumb-'.$aboutus->photo_url)){
					unlink(public_path().'/uploads/aboutus/thumb-'.$aboutus->photo_url);
			    }

			    if(is_file(public_path().'/uploads/aboutus/medium-'.$aboutus->photo_url) and file_exists(public_path().'/uploads/aboutus/medium-'.$aboutus->photo_url)){
                    unlink(public_path().'/uploads/aboutus/medium-'.$aboutus->photo_url);
                }
                if(is_file(public_path().'/uploads/aboutus/large-'.$aboutus->photo_url) and file_exists(public_path().'/uploads/aboutus/large-'.$aboutus->photo_url)){
					unlink(public_path().'/uploads/aboutus/large-'.$aboutus->photo_url);
			    }

        	}
        }

       
        if($aboutus->update($data)){
            return redirect('cms/aboutus');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$aboutus = Aboutus::find($id);

		if(is_file(public_path().'/uploads/aboutus/'.$aboutus->photo_url) and file_exists(public_path().'/uploads/aboutus/'.$aboutus->photo_url)){
			unlink(public_path().'/uploads/aboutus/'.$aboutus->photo_url);
        }
	   
	    if(is_file(public_path().'/uploads/aboutus/thumb-'.$aboutus->photo_url) and file_exists(public_path().'/uploads/aboutus/thumb-'.$aboutus->photo_url)){
			unlink(public_path().'/uploads/aboutus/thumb-'.$aboutus->photo_url);
	    }

	    if(is_file(public_path().'/uploads/aboutus/medium-'.$aboutus->photo_url) and file_exists(public_path().'/uploads/aboutus/medium-'.$aboutus->photo_url)){
			unlink(public_path().'/uploads/aboutus/medium-'.$aboutus->photo_url);
	    }
        if(is_file(public_path().'/uploads/aboutus/large-'.$aboutus->photo_url) and file_exists(public_path().'/uploads/aboutus/large-'.$aboutus->photo_url)){
                    unlink(public_path().'/uploads/aboutus/large-'.$aboutus->photo_url);
                }

        Aboutus::destroy($id);

        return redirect('cms/aboutus');
    }

}
