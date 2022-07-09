<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Response;
use Validator;
use Redirect;

class MenusController extends BaseController {

    public function index()
    {
        $menus = Menu::paginate(15);
        return view('cms.menus.index', compact('menus'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Menu::$rules);

        $menu = Menu::create($request->only('title','category'));

        if(request('title_en')){
            app()->setLocale('en');
            $menu->title=request('title_en');
            $menu->save();
         }

        if($menu){
            return redirect('cms/menu');
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
        $menu = Menu::find($id);

        return view("cms.menus.edit", compact('menu'));
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
        $request->validate(Menu::$rules);

        $menu = Menu::find($id);

        $menu->update($request->only('title','category'));
        
        if(request('title_en')){
            app()->setLocale('en');
            $menu->title=request('title_en');
            $menu->save();
         }

        return redirect('cms/menu');

    }


    public function destroy($id)
    {
        $menu = Menu::destroy($id);

        return redirect('cms/menu');
    }


}
