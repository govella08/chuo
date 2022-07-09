<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Administration;
use App\Models\AdministrationCategories;
use App\Models\AdministrationGroups;

use Response;
use Validator;
use Redirect;
use Image;
use Auth;

class AdministrationController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {//dd(public_path());
        $administration = Administration::orderBy('position', 'ASC')->paginate(100);
        //$categories = array();
        $categories = AdministrationCategories::pluck('title', 'id');
        $groups = AdministrationGroups::pluck('title', 'id');
        return view('cms.administration.index', compact('administration', 'categories', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.administration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(Administration::$rules);
       /* $validator = Validator::make($request->all(), Administration::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }*/

        $data = $request->only('fullname','content','title','position','category_id', 'group_id', 'email');
        //dd($data);
        if($request->hasFile('photo_url')){
            if($request->file('photo_url')->isValid()){

                $file = $request->file('photo_url');

                $name = time(). '-' .$file->getClientOriginalName();

                $file->move(public_path().'/uploads/administration/', $name);
//dd(public_path());
                $img = Image::make(public_path().'/uploads/administration/'.$name);

                // $img = Image::make($file);
                $img->backup();
                $img->resize(113, 98);
//                $img->fit(113, 98, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//
//                });

                $thumb_path = public_path().'/uploads/administration/thumb-'.$name;
                $img->save($thumb_path);
                $img->reset();
                $img->resize(282, 282);
//                $img->fit(282, 282, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//
//                });

                $medium_path = public_path().'/uploads/administration/medium-'.$name;

                $img->save($medium_path);
                $data['photo_url'] = $name;

            }
        }

        //$data['user_id'] = Auth::user()->id;
        $administration = Administration::create($data);

        if(request('title_en')){
            app()->setLocale('en');
            $administration->title=request('title_en');
            $administration->save();
        }
        if(request('content_en')){
            app()->setLocale('en');
            $administration->content=request('content_en');
            $administration->save();
        }

        if($administration){
            return redirect('cms/administration');
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
        $administration = Administration::find($id);
        $categories = AdministrationCategories::pluck('title', 'id');
        $groups = AdministrationGroups::pluck('title', 'id');
        return view("cms.administration.edit", compact('administration', 'categories', 'groups'));
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
    	$administration = Administration::find($id);

        $rules = Administration::$rules;

    	$rules['photo_url'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:4096';
         //dd($rules);
        $request->validate($rules);

        $data = $request->only('fullname','content','title','position','category_id', 'group_id', 'email');

        if($request->hasFile('photo_url')){
            if($request->file('photo_url')->isValid()){

                $file = $request->file('photo_url');

                $name = time(). '-' .$file->getClientOriginalName();

                $file->move(public_path().'/uploads/administration/', $name);

                $img = Image::make(public_path().'/uploads/administration/'.$name);

                // $img = Image::make($file);
                $img->backup();
                $img->resize(113, 98);
//                $img->fit(113, 98, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//
//                });

                $thumb_path = public_path().'/uploads/administration/thumb-'.$name;
                $img->save($thumb_path);
                $img->reset();
                $img->resize(282, 282);
//                $img->fit(282, 282, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//
//                });

                $medium_path = public_path().'/uploads/administration/medium-'.$name;

                $img->save($medium_path);

                $data['photo_url'] = $name;

            }
             $data['photo_url']=$data['photo_url'];
        }

        //$data['user_id'] = Auth::user()->id;
        $administration->update($data);

        if(request('title_en')){
            app()->setLocale('en');
            $administration->title=request('title_en');
            $administration->save();
        }
        if(request('content_en')){
            app()->setLocale('en');
            $administration->content=request('content_en');
            $administration->save();
        }

        
        return redirect('cms/administration');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    	$administration = Administration::find($id);

		if(is_file(public_path().'/uploads/administration/'.$administration->photo_url) and file_exists(public_path().'/uploads/administration/'.$administration->photo_url)){
            unlink(public_path().'/uploads/administration/'.$administration->photo_url);
        }
       
        if(is_file(public_path().'/uploads/administration/thumb-'.$administration->photo_url) and file_exists(public_path().'/uploads/administration/thumb-'.$administration->photo_url)){
            unlink(public_path().'/uploads/administration/thumb-'.$administration->photo_url);
        }

        if(is_file(public_path().'/uploads/administration/medium-'.$administration->photo_url) and file_exists(public_path().'/uploads/administration/medium-'.$administration->photo_url)){
            unlink(public_path().'/uploads/administration/medium-'.$administration->photo_url);
        }
		Administration::destroy($id);

        return redirect('cms/administration');
    }

}
