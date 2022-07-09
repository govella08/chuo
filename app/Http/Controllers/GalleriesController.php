<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Gallery;
use App\Models\Photo;


class GalleriesController extends BaseController {

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Gallery::all()->groupBy('type');       
        return view('cms.galleries.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(Gallery::$rules);

        $data = $request->only('title', 'content','type','featured');

        if($request->featured){
            Gallery::where('type','=','photos')->update(['featured'=>0]);
        }

        $gallery = Gallery::create($data);

        if(request('title_en')){
            app()->setLocale('en');
            $gallery->title=request('title_en');
            $gallery->save();
         }

         if(request('content_en')){
            app()->setLocale('en');
            $gallery->content=request('content_en');
            $gallery->save();
         }

            $gallery->slug=null;

            $slug = SlugService::createSlug(gallery::class, 'slug', $request->title);
            $gallery->slug=$slug;
            app()->setLocale('en');

            $gallery->save();

        if($gallery){
            return redirect('cms/galleries');
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
        $gallery = Gallery::find($id);

        return view("cms.galleries.edit", compact('gallery'));
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
     
        $request->validate(Gallery::$rules);

        $data = $request->only('title', 'content','type','featured');

        if($request->featured){
            Gallery::where('type','=','photos')->update(['featured'=>0]);
        }

        $gallery = Gallery::find($id);

        $gallery->update($data);

        if(request('title_en')){
            app()->setLocale('en');
            $gallery->title=request('title_en');
            $gallery->save();
         }

         if(request('content_en')){
            app()->setLocale('en');
            $gallery->content=request('content_en');
            $gallery->save();
         }

        $gallery->slug=null;

        $slug = SlugService::createSlug(gallery::class, 'slug', $request->title);
        $gallery->slug=$slug;
        app()->setLocale('en');

        $gallery->save();

       
       

        return redirect('cms/galleries');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //before add codes
        //$gallery = Gallery::destroy($id);
        //after adding
        $category = Gallery::find($id);
        $medias = Photo::where('gallery_id','=',$id)->get();
         foreach($medias as $media){
        if(file_exists(public_path().$media->path.$media->filename) && is_file(public_path().$media->path.$media->filename)){
                unlink(public_path().$media->path.$media->filename);
            }
           if(file_exists(public_path().$media->path.'large_'.$media->filename) && is_file(public_path().$media->path.'large_'.$media->filename)){
                unlink(public_path().$media->path.'large_'.$media->filename);
            }

           if(file_exists(public_path().$media->path.'thumb_'.$media->filename) && is_file(public_path().$media->path.'thumb_'.$media->filename)){
                unlink(public_path().$media->path.'thumb_'.$media->filename);
            }
        }
        $category->medias()->delete();
        $category->delete();
        //end after adding
        
        
        return redirect('cms/galleries');
    }

}
