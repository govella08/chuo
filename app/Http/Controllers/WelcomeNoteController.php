<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\WelcomeNote;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use Image;
use Redirect;


class WelcomeNoteController extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = WelcomeNote::orderBy('id', 'DESC')->paginate(7);
        if(count($data) <= 0 ) return Redirect::route('cms.welcome.create'); 
        return view('cms.welcome.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.welcome.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(WelcomeNote::$rules);

        $data = $request->except('summary_en','content_en'); 

        $welcome = WelcomeNote::create($data);


        if(request('summary_en')){
            app()->setLocale('en');
            $welcome->summary=request('summary_en');
            $welcome->save();
        }

        if(request('content_en')){
            app()->setLocale('en');
            $welcome->content=request('content_en');
            $welcome->save();
        }

        $welcome->slug=null;

        $slug = SlugService::createSlug(WelcomeNote::class, 'slug', $request->summary);
        $welcome->slug=$slug;
        app()->setLocale('en');

        $welcome->save();

        if($welcome){
            return redirect('cms/welcome');
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
        $welcome = WelcomeNote::find($id);

        return view("cms.welcome.edit", compact('welcome'));
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
        $welcome = WelcomeNote::find($id);

        $request->validate(WelcomeNote::$rules);

        $data = $request->except('summary_en','content_en'); 

        $welcome->update($data);
       // $welcome->update($data)


        if(request('summary_en')){
            app()->setLocale('en');
            $welcome->summary=request('summary_en');
            $welcome->save();
        }

        if(request('content_en')){
            app()->setLocale('en');
            $welcome->content=request('content_en');
            $welcome->save();
        }

        $welcome->slug=null;
        $welcome->save();
        $slug = SlugService::createSlug(WelcomeNote::class, 'slug', $request->summary);
        $welcome->slug=$slug;
        app()->setLocale('en');

        $welcome->save();

        return redirect('cms/welcome');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$welcome = WelcomeNote::find($id);

        WelcomeNote::destroy($id);

        return redirect('cms/welcome');
    }

}
