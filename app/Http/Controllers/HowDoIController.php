<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Models\HowDoI;

class HowDoIController extends BaseController {

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $howdois = HowDoI::orderBy('id', 'DESC')->get();
        return view('howdois.index', compact('howdois'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('howdois.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(HowDoI::$rules);

        $data = $request->only('title','content','active');

        $howdoi = HowDoI::create($data);

        if(request('title_en')){
            app()->setLocale('en');
            $howdoi->title=request('title_en');
            $howdoi->save();
         }

         if(request('content_en')){
            app()->setLocale('en');
            $howdoi->content=request('content_en');
            $howdoi->save();
         }

            $howdoi->slug=null;

            $slug = SlugService::createSlug(HowDoI::class, 'slug', $request->title);
            $howdoi->slug=$slug;
            app()->setLocale('en');

            $howdoi->save();

        if($howdoi){
            return redirect('cms/howdois');
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
        $howdoi = HowDoI::find($id);

        return view("howdois.edit", compact('howdoi'));
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
        $request->validate(HowDoI::$rules);

        $data=$request->only('title','content','active');
        
        $howdoi = HowDoI::find($id);

        $howdoi->update($data);

        if(request('title_en')){
            app()->setLocale('en');
            $howdoi->title=request('title_en');
            $howdoi->save();
         }
         if(request('content_en')){
            app()->setLocale('en');
            $howdoi->content=request('content_en');
            $howdoi->save();
         }

        $howdoi->slug=null;
        $slug = SlugService::createSlug(HowDoI::class, 'slug', $request->title);
        $howdoi->slug=$slug;
        app()->setLocale('en');

        $howdoi->save();

       
        return redirect('cms/howdois');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $howdoi = HowDoI::destroy($id);

        return redirect('cms/howdois');
    }

}
