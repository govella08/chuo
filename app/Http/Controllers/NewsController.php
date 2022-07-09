<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\News;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use \Waavi\Translation\Repositories\LanguageRepository;
use Image;

class NewsController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LanguageRepository $ltr)
    {
        /*
            $availables= $ltr->availableLocales();
            dd($availables);
        */
        $news_list = News::orderBy('id', 'DESC')->paginate(7);
        $select = News::orderBy('id', 'ASC')->pluck('title','id')->toArray();
        return view('cms.news.index', compact('news_list','select'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //return $request->all();
        $request->validate(News::$rules);

        $name = $request->input('active', '1');

        $inputs = $request->only('title', 'summary','content','active');

        // if($request->hasFile('json_file')){
        //     if($request->file('json_file')->isValid()){

        //         $file = $request->file('json_file');

        //         $name = time(). '-' .$file->getClientOriginalName();

        //         $file->move(public_path().'/uploads/news/', $name);


        //         $jsonString = file_get_contents(public_path().'/uploads/news/'.$name);

        //         $json_data = json_decode($jsonString, true);

        //         dd($json_data);

        //     }
        // }
        
        if($request->hasFile('photo_url')){
        	if($request->file('photo_url')->isValid()){

        		$file = $request->file('photo_url');

				$name = time(). '-' .$file->getClientOriginalName();

				$file->move(public_path().'/uploads/news/', $name);

				$img = Image::make(public_path().'/uploads/news/'.$name);

				$img->backup();
                $img->resize(100, 48);
//				$img->fit(100, 48, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//
//                });

                $thumb_path = public_path().'/uploads/news/thumb-'.$name;
                $img->save($thumb_path);
                $img->reset();
                $img->resize(200, 96);
//                $img->fit(200, 96, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//                });
                $medium_path = public_path().'/uploads/news/medium-'.$name;
                $img->save($medium_path);
                $img->reset();


                $img->resize(685, 375);
//                $img->fit(685, 375, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//                });
                $large_path = public_path().'/uploads/news/large-'.$name;
                $img->save($large_path);

                //$data['photo_url'] = $name;
		        $inputs['photo_url'] = $name;

        	}
        }

        app()->setLocale('sw');
        $news= auth()->user()->news()->save(new News($inputs));

         if(request('title_en')){
            app()->setLocale('en');
            $news->title=request('title_en');
            $news->save();
         }

         if(request('summary_en')){
            app()->setLocale('en');
            $news->summary=request('summary_en');
            $news->save();
         }

         if(request('content_en')){
            app()->setLocale('en');
            $news->content=request('content_en');
            $news->save();
         }

            $news->slug=null;

            $slug = SlugService::createSlug(News::class, 'slug', $request->title);
            $news->slug=$slug;
            app()->setLocale('en');

            $news->save();
        

        if($news){
            return redirect('cms/news');
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
        $news = News::find($id);
        $select = News::orderBy('id', 'ASC')->pluck('title','id')->toArray();
        return view("cms.news.edit", compact('news','select'));
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
        $news = News::find($id);

    	$rules = News::$rules;

    	$rules['photo_url'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:4096';

        $request->validate($rules);

        $inputs = $request->only('title', 'summary','content','active');

        if($request->hasFile('photo_url')){
        	if($request->file('photo_url')->isValid()){

        		$file = $request->file('photo_url');

				$name = time(). '-' .$file->getClientOriginalName();

				$file->move(public_path().'/uploads/news/', $name);

				$img = Image::make(public_path().'/uploads/news/'.$name);

				$img->backup();
                $img->resize(100, 48);

                $thumb_path = public_path().'/uploads/news/thumb-'.$name;
                $img->save($thumb_path);
                $img->reset();

                $img->resize(200, 96);
                $medium_path = public_path().'/uploads/news/medium-'.$name;
                $img->save($medium_path);
                $img->reset();

                $img->resize(685, 375);
                $large_path = public_path().'/uploads/news/large-'.$name;
                $img->save($large_path);

                //$data['photo_url'] = $name;
		        $inputs['photo_url'] = $name;

		        if(is_file(public_path().'/uploads/news/'.$news->photo_url) and file_exists(public_path().'/uploads/news/'.$news->photo_url)){
					unlink(public_path().'/uploads/news/'.$news->photo_url);
		        }
			   
			    if(is_file(public_path().'/uploads/news/thumb-'.$news->photo_url) and file_exists(public_path().'/uploads/news/thumb-'.$news->photo_url)){
					unlink(public_path().'/uploads/news/thumb-'.$news->photo_url);
			    }

			    if(is_file(public_path().'/uploads/news/medium-'.$news->photo_url) and file_exists(public_path().'/uploads/news/medium-'.$news->photo_url)){
                    unlink(public_path().'/uploads/news/medium-'.$news->photo_url);
                }
                if(is_file(public_path().'/uploads/news/large-'.$news->photo_url) and file_exists(public_path().'/uploads/news/large-'.$news->photo_url)){
					unlink(public_path().'/uploads/news/large-'.$news->photo_url);
			    }

        	}
        }

        //$data['user_id'] = Auth::user()->id;
        $inputs['user_id'] = auth()->user()->id;

        $news->update($inputs);

        if(request('title_en')){
            app()->setLocale('en');
            $news->title=request('title_en');
            $news->save();

         }

         if(request('summary_en')){
            
            app()->setLocale('en');
            $news->summary=request('summary_en');
            $news->save();
         }

         if(request('content_en')){
            app()->setLocale('en');
            $news->content=request('content_en');
            $news->save();
         }

        $news->slug=null;

        $slug = SlugService::createSlug(News::class, 'slug', $request->title);
        $news->slug=$slug;
        $news->save();

        return redirect('cms/news');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	
        $news = News::find($id);

		if(is_file(public_path().'/uploads/news/'.$news->photo_url) and file_exists(public_path().'/uploads/news/'.$news->photo_url)){
			unlink(public_path().'/uploads/news/'.$news->photo_url);
        }
	   
	    if(is_file(public_path().'/uploads/news/thumb-'.$news->photo_url) and file_exists(public_path().'/uploads/news/thumb-'.$news->photo_url)){
			unlink(public_path().'/uploads/news/thumb-'.$news->photo_url);
	    }

	    if(is_file(public_path().'/uploads/news/medium-'.$news->photo_url) and file_exists(public_path().'/uploads/news/medium-'.$news->photo_url)){
			unlink(public_path().'/uploads/news/medium-'.$news->photo_url);
	    }

        if(is_file(public_path().'/uploads/news/large-'.$news->photo_url) and file_exists(public_path().'/uploads/news/large-'.$news->photo_url)){
            unlink(public_path().'/uploads/news/large-'.$news->photo_url);
        }

        News::destroy($id);

        return redirect('cms/news');
    }

}
