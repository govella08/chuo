<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Biography;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use Validator;
use Redirect;
use Image;

class BiographiesController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $biography = Biography::all()->first();
        if(!$biography) return Redirect::route('cms.biography.create');
       
        return view('cms.biographies.index',compact('biography'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $biography = new Biography();
        /*$biography = Biography::all()->first();
        $biography = ($biography)?$biography:new Biography;*/
        return view('cms.biographies.create',compact('biography'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        //$validator = Validator::make($data = $request->all(), Biography::$rules);

        $validator = $request->validate(Biography::$rules);

        $data = $request->only('title','name','salutation','content','active');
        
        $biography = Biography::all()->first();
        $biography = ($biography)?$biography:new Biography;
        // //dd($data);
        // if(!$biography){
        //     Biography::create($data);
        // } else {
            $biography->fill($data);
            $biography->save();
        //}
        

        return Redirect::route('cms.biography.index');
    }

    public function update(Request $request, $id)
    {
        $biography = Biography::find($id);

        $validator = $request->validate(Biography::$rules);

        $data = $request->only('title','name','salutation','content','active');

        $biography->update($data);

        if(request('title_en')){
            app()->setLocale('en');
            $biography->title=request('title_en');
            $biography->save();
         }

         if(request('salutation_en')){
            app()->setLocale('en');
            $biography->salutation=request('salutation_en');
            $biography->save();
         }

         if(request('content_en')){
            app()->setLocale('en');
            $biography->content=request('content_en');
            $biography->save();
         }

        $biography->slug=null;

        $slug = SlugService::createSlug(Biography::class, 'slug', 'bio');
        $biography->slug=$slug;
        app()->setLocale('en');

        $biography->update();

       /* if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }*/
  
     
        return Redirect::route('cms.biography.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $biographies = Biography::findBySlug($slug);
        return view('cms.biographies.show',compact('biographies')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $biography = Biography::find($id);
        return view("cms.biographies.edit", compact('biography'));
    }

    public function photoUpload(Request $request, $bioID){
      $request->validate(['photourl' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',]);

        $biography = Biography::find($bioID);

        //die($biography);
        if( $biography && $request->hasFile('photourl') ){
            //deleting if there is file
            if(file_exists(public_path().'/'.$biography->photo_url) && is_file(public_path().'/'.$biography->photo_url)){
                unlink(public_path().'/'.$biography->photo_url);
            }

            $imgUrl =$request->file('photourl');
            $filename = 'bio_'.time() . '-' .$imgUrl->getClientOriginalName();
            $imgUrl->move(public_path().'/uploads/bio/', $filename);
            $biography->photo_url = 'uploads/bio/'.$filename;
            $biography->update(); 
        }

        /*if($request->hasFile('photourl')){

            if($request->file('photourl')->isValid()){

                $file = $request->file('photourl');

                $name = time(). '-' .$file->getClientOriginalName();

                $file->move(public_path().'/uploads/bio/', $name);

                $img = Image::make(public_path().'/uploads/bio/'.$name);

                $img->backup();
                $img->fit(232, 260, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();

                });

                $thumb_path = public_path().'/uploads/bio/'.$name;
                $img->save($thumb_path);
                $img->reset();

                $data['photourl'] = $name;

            }
        }
       $biography->update(); */
      return redirect()->back();

    }



}