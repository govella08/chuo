<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use Illuminate\Http\Request;
use App\Models\Service;

use Image;

class ServicesController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id', 'DESC')->paginate(15);        
        return view('cms.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$rules = [
    'summary_en' => 'required|max:300',
    'summary_sw' => 'required|max:300',
    'title_en' => 'required|max:120',
    'title_sw' => 'required|max:120',
    'content_en' => 'required',
    'content_sw' => 'required',
    'photo_url' => 'required|mimes:jpg,png,jpeg,bmp|max:2000'
    ];
        $request->validate(Service::$rules);

        $data = $request->except('title_en', 'summary_en','content_en');
 
        if($request->hasFile('photo_url')){
            if($request->file('photo_url')->isValid()){

                $file = $request->file('photo_url');

                $name = time(). '-' .$file->getClientOriginalName();

                $file->move(public_path().'/uploads/services/', $name);

                $img = Image::make(public_path().'/uploads/services/'.$name);

                // $img = Image::make($file);
                $img->backup();
                $img->fit(218, 108, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();

                });

                $thumb_path = public_path().'/uploads/services/thumb-'.$name;
                $img->save($thumb_path);
                $img->reset();

                $img->fit(298, 248, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();

                });

                $medium_path = public_path().'/uploads/services/medium-'.$name;

                $img->save($medium_path);

                $data['photo_url'] = $name;

            }
        }
        $service = Service::create($data);


         if(request('title_en')){
            app()->setLocale('en');
            $service->title=request('title_en');
            $service->save();
         }

         if(request('summary_en')){
            
            app()->setLocale('en');
            $service->summary=request('summary_en');
            $service->save();
         }

         if(request('content_en')){
            app()->setLocale('en');
            $service->content=request('content_en');
            $service->save();
         }

            $service->slug=null;

            $slug = SlugService::createSlug(Service::class, 'slug', $request->title);
            $service->slug=$slug;
            $service->save();


        if($service){
            return redirect('cms/services');
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
        $service = Service::find($id);        
        return view("cms.services.edit", compact('service'));
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
    	$service = Service::find($id);

        $request->validate(Service::$rules);

        $data = $request->except('title_en', 'summary_en','content_en');

        if($request->hasFile('photo_url')){
            if($request->file('photo_url')->isValid()){

                $file = $request->file('photo_url');

                $name = time(). '-' .$file->getClientOriginalName();

                $file->move(public_path().'/uploads/services/', $name);

                $img = Image::make(public_path().'/uploads/services/'.$name);

                // $img = Image::make($file);
                $img->backup();
                $img->fit(218, 108, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();

                });

                $thumb_path = public_path().'/uploads/services/thumb-'.$name;
                $img->save($thumb_path);
                $img->reset();

                $img->fit(298, 248, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();

                });

                $medium_path = public_path().'/uploads/services/medium-'.$name;

                $img->save($medium_path);

                if(is_file(public_path().'/uploads/services/'.$service->photo_url) and file_exists(public_path().'/uploads/services/'.$service->photo_url)){
                    unlink(public_path().'/uploads/services/'.$service->photo_url);
                }
               
                if(is_file(public_path().'/uploads/services/thumb-'.$service->photo_url) and file_exists(public_path().'/uploads/services/thumb-'.$service->photo_url)){
                    unlink(public_path().'/uploads/services/thumb-'.$service->photo_url);
                }

                if(is_file(public_path().'/uploads/services/medium-'.$service->photo_url) and file_exists(public_path().'/uploads/services/medium-'.$service->photo_url)){
                    unlink(public_path().'/uploads/services/medium-'.$service->photo_url);
                }

                $data['photo_url'] = $name;

            }
        }

        $service->update($data);

        if(request('title_en')){
            app()->setLocale('en');
            $service->title=request('title_en');
            $service->save();
         }

         if(request('summary_en')){
            
            app()->setLocale('en');
            $service->summary=request('summary_en');
            $service->save();
         }

         if(request('content_en')){
            app()->setLocale('en');
            $service->content=request('content_en');
            $service->save();
         }

            $service->slug=null;
            $service->save();
            $slug = SlugService::createSlug(Service::class, 'slug', $request->title);
            $service->slug=$slug;
            $service->save();

        return redirect('cms/services');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    	$services = Service::find($id);

		if(file_exists(public_path().'/uploads/services/'.$services->photo_url)){
            unlink(public_path().'/uploads/services/'.$services->photo_url);
        }
       
        if(file_exists(public_path().'/uploads/services/thumb-'.$services->photo_url)){
            unlink(public_path().'/uploads/services/thumb-'.$services->photo_url);
        }

        if(file_exists(public_path().'/uploads/services/medium-'.$services->photo_url)){
            unlink(public_path().'/uploads/services/medium-'.$services->photo_url);
        }
		Service::destroy($id);

        return redirect('cms/services');
    }

}
