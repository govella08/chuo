<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Alumni;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use \Waavi\Translation\Repositories\LanguageRepository;

use Response;
use Validator;
use Redirect;
use Image;
use Auth;

class AlumniController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnis = Alumni::orderBy('id', 'ASC')->paginate(15);
        return view('cms.alumni.index', compact('alumnis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Alumni::$rules);
        //dd($request->validate(Alumni::$rules));
        $data = $request->only('fullname','title','alumni');
        // dd($data);
        if($request->hasFile('photo_url')){
            if($request->file('photo_url')->isValid()){

                $file = $request->file('photo_url');

                $name = time(). '-' .$file->getClientOriginalName();

                $file->move(public_path().'/uploads/alumni/', $name);

                $img = Image::make(public_path().'/uploads/alumni/'.$name);

                // $img = Image::make($file);
                $img->backup();
                $img->resize(113, 98);
//                $img->fit(113, 98, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//
//                });

                $thumb_path = public_path().'/uploads/alumni/thumb-'.$name;
                $img->save($thumb_path);
                $img->reset();
                $img->resize(282, 282);
//                $img->fit(282, 282, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//
//                });

                $medium_path = public_path().'/uploads/alumni/medium-'.$name;

                $img->save($medium_path);
                $data['photo_url'] = $name;

            }
        }

        //$data['user_id'] = Auth::user()->id;
        $alumnis = Alumni::create($data);
        //dd($alumnis);
        if(request('title_en')){
            app()->setLocale('en');
            $alumnis->title=request('title_en');
            $alumnis->save();
        }
        if(request('content_en')){
            app()->setLocale('en');
            $alumnis->content=request('alumni_en');
            $alumnis->save();
        }

        $alumnis->slugy=null;

        $slugy = SlugService::createSlug(alumni::class, 'slugy', $request->fullname);
        $alumnis->slugy=$slugy;
        app()->setLocale('en');

        $alumnis->save();

        if($alumnis){
            return redirect('cms/alumni');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumnis = Alumni::find($id);
        return view("cms.alumni.edit", compact('alumnis'));
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
        $alumnis = Alumni::find($id);

        $rules = Alumni::$rules;

    	$rules['photo_url'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:4096';
         //dd($rules);
        $request->validate($rules);

        $data = $request->only('fullname','title','alumni');

        if($request->hasFile('photo_url')){
            if($request->file('photo_url')->isValid()){

                $file = $request->file('photo_url');

                $name = time(). '-' .$file->getClientOriginalName();

                $file->move(public_path().'/uploads/alumni/', $name);

                $img = Image::make(public_path().'/uploads/alumni/'.$name);

                // $img = Image::make($file);
                $img->backup();
                $img->resize(113, 98);
//                $img->fit(113, 98, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//
//                });

                $thumb_path = public_path().'/uploads/alumni/thumb-'.$name;
                $img->save($thumb_path);
                $img->reset();
                $img->resize(282, 282);
//                $img->fit(282, 282, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//
//                });

                $medium_path = public_path().'/uploads/alumni/medium-'.$name;

                $img->save($medium_path);

                $data['photo_url'] = $name;

            }
             $data['photo_url']=$data['photo_url'];
        }

        //$data['user_id'] = Auth::user()->id;
        $alumnis->update($data);

        if(request('title_en')){
            app()->setLocale('en');
            $alumnis->title=request('title_en');
            $alumnis->save();
        }
        if(request('alumni_en')){
            app()->setLocale('en');
            $alumnis->alumni=request('alumni_en');
            $alumnis->save();
        }

        
        return redirect('cms/alumni');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumnis = Alumni::find($id);

		if(is_file(public_path().'/uploads/alumni/'.$alumnis->photo_url) and file_exists(public_path().'/uploads/alumni/'.$alumnis->photo_url)){
            unlink(public_path().'/uploads/alumni/'.$alumnis->photo_url);
        }
       
        if(is_file(public_path().'/uploads/alumni/thumb-'.$alumnis->photo_url) and file_exists(public_path().'/uploads/alumni/thumb-'.$alumnis->photo_url)){
            unlink(public_path().'/uploads/alumni/thumb-'.$alumnis->photo_url);
        }

        if(is_file(public_path().'/uploads/alumni/medium-'.$alumnis->photo_url) and file_exists(public_path().'/uploads/alumni/medium-'.$alumnis->photo_url)){
            unlink(public_path().'/uploads/alumni/medium-'.$alumnis->photo_url);
        }
		Alumni::destroy($id);

        return redirect('cms/alumni');
    }
}
