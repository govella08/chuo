<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Page_category;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PagesController extends BaseController {

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::paginate(15);
        $categories = Page_category::all()->pluck('title','id');

        return view('cms.pages.index', compact('pages','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Page_category::all()->pluck('title','id')->toArray();
        return view('cms.pages_categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Page::$rules);

        $page = Page::create($request->except('title_en','content_en'));

        if(request('title_en')){
            app()->setLocale('en');
            $page->title=request('title_en');
            $page->save();
         }

         if(request('content_en')){
            app()->setLocale('en');
            $page->content=request('content_en');
            $page->save();
         }

            $page->slug=null;

            $slug = SlugService::createSlug(page::class, 'slug', $request->title);
            $page->slug=$slug;
            app()->setLocale('en');

            $page->save();

        if($page){
            return redirect()->route('cms.pages.index');
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
        $page = Page::find($id);
        $categories = Page_category::all()->pluck('title_en','id');

        return view("cms.pages.edit", compact('page','categories'));
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
        $request->validate(Page::$rules);
        
        $page = Page::find($id);

        $page->update($request->except('title_en','content_en'));

        if(request('title_en')){
            app()->setLocale('en');
            $page->title=request('title_en');
            $page->save();
         }

         if(request('content_en')){
            app()->setLocale('en');
            $page->content=request('content_en');
            $page->save();
         }

        // $page->slug=null;

        // $slug = SlugService::createSlug(Page::class, 'slug', $request->title);
        // $page->slug=$slug;

        $page->save();

        return redirect()->route('cms.pages.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::destroy($id);

        return redirect('cms/pages');
    }

}
