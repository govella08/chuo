<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem as MenuItem;
use Illuminate\Http\Request;
use Response;

class MenuItemsController extends BaseController
{

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            parent::__construct();
            // $this->middleware('acl');
        }

        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index($menuID)
        {
            $menu              = Menu::findOrFail($menuID);
            $menuItem          = new MenuItem();
            $menuItem->menu_id = $menu->id;
            $pages             = array();

            $selectmenu = Menu::selectMenu();
            // return "hello";
            return View('cms.menus.menu_items.index', compact(array('selectmenu', 'menuItem', 'menu')));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @return Response
         */
        public function store(Request $request)
        {
            //dd($request->all());
            $data = $request->except(['title_en']);

            $data['position'] = MenuItem::where('parent','=',0)->max('position')+1;

            $menu_item=MenuItem::create($data);
            
            if(request('title_en')){
                app()->setLocale('en');
                $menu_item->title=request('title_en');
                $menu_item->save();
            }

            return redirect()->route('cms.menu-items.index', $data['menu_id']);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return Response
         */
        public function edit($id)
        {
            
            $menuitem = MenuItem::find($id);
            $pages    = array();

            $selectmenu = Menu::selectMenu();


            return View('cms.menus.menu_items.edit', compact(array('menuitem', 'pages', 'selectmenu')));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    function update($id, Request $request)
    {
        $menuitem = MenuItem::findOrFail($id);

        $data = $request->except(['title_en']);

        $data['position'] = MenuItem::where('parent', '=', 0)->max('position') + 1;

        $menuitem->update($data);

        if(request('title_en')){
            app()->setLocale('en');
            $menuitem->title=request('title_en');
            $menuitem->save();
        }


        return redirect()->route('cms.menu-items.index', $data['menu_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    function destroy($id)
    {
        $menuitem = MenuItem::findOrFail($id);
        $menu = $menuitem->menu_id;
        if (MenuItem::destroy($id)) {
        }

        return redirect()->route('cms.menu-items.index',$menu);
    }

    //Meu update functions
    function ajax_update(Request $request)
    {
        global $family;

        $family = array();

        function getchildren($parent)
        {
            global $family;

            if (isset($parent->children)) {

                foreach ($parent->children as $child) {

                    $family[] = array('p' => $parent->id, 'c' => $child->id);

                    if (isset($child->children)) {
                        getchildren($child);
                    }
                }

            } else {

            }
        }

        $menuitems  = $request->all();
        $parent_pos = json_decode($menuitems['positions']);

        $menuitems = json_decode($menuitems['data']);

        foreach ($menuitems as $m) {
            getchildren($m);

        }

        $i = 1;
        foreach ($parent_pos as $p) {
            MenuItem::where('id', '=', $p)->update(array('position' => $i, 'parent' => 0));
            $i++;
        }

        $change_parent = '';
        $position      = 1;

        foreach ($family as $member) {
            if ($change_parent != $member['p']) {
                $position      = 1;
                $change_parent = $member['p'];

            } else {
                $position++;

            }

            MenuItem::where('id', '=', $member['c'])->update(array('position' => $position, 'parent' => $member['p']));

        }

        return Response::json($menuitems);
    }

    #ajax called function below
    function home_menu()
    {

        $menuitems = MenuItem::select('id', 'title_en')->where('menu_name', '=', Input::get('type'))->where('parent', '=', 0)->get();
        $menu      = '<option value="0">None</option>';
        foreach ($menuitems as $item) {
            $selected = ($item->id == Input::get('selected')) ? 'selected' : '';
            $menu     = $menu . "<option value='{$item->id}' {$selected}>{$item->title_en}</option>";
        }
        echo $menu;

    }

}
