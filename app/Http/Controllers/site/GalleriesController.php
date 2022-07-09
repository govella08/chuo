<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Photo;
use DB;

use Response;


class GalleriesController extends BaseSiteController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($type, $gallery_id=0)
    {
        if($type == 'videos'){
            $videos = DB::table('galleries')
                ->join('media','gallery_id','=','galleries.id')
                ->where('galleries.type','=','videos')->select('media.*')->orderBy('created_at', 'desc')->paginate(6);
            return view('site.galleries.videos', compact('videos'));
        }

        $galleries = Gallery::where('type','=',$type)->where('featured',0)->with('photos')->orderBy('created_at', 'DESC')->paginate(6);
      
        return view('site.galleries.index', compact('galleries')); 

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($galleryID)
    {
        $gallery = Photo::where('gallery_id','=',$galleryID)->get();

        return view('site.galleries.show', compact('gallery'));
    }   

    public function showSlider($id)
    {
        //$slider = Photo::findBySlug($id);
        $slider = Photo::find($id);
        return view('site.galleries.show-slider', compact('slider'));
    }    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function videos()
    {

        $galleries = Gallery::where('type','=','videos')->with('videos')->paginate(20);
       $videos = DB::table('galleries')
        ->join('media','gallery_id','=','galleries.id')
        ->where('galleries.type','=','videos')->select('media.*')->paginate(15);
        return view('site.galleries.videos', compact('videos'));
    }

    

}
