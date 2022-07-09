<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Request;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class MenuItem extends Model  implements  TrackableInterface{

	use FormAccessible,TrackableTrait;
	use WaaviTransilation;

	// Don't forget to fill this array

	protected $guarded=[];

	protected $translatableAttributes = ['title'];
	/*protected $fillable = [
	'title'
	,'menu_id'
		// ,'featured'
	, 'title_sw'
	, 'active'
	, 'menu_name'
	, 'url'
	, 'parent'
	, 'position'
		// , 'user_id'
		// ,'link'
		// ,'has_sidebar'
	];*/

	public function getTitleEnAttribute($value)
    {
        return __($this->title_translation,[],'en');
    }

	public function menu(){
		return $this->belongsTo('App\Models\Menu');
	}

	public static function active(){

		return MenuItem::where('active','=',1);

	}


	function menus(){
		return $this->hasMany('menuitem', 'parent')->where('menu_name','=','bottom_menu');
	}

	public static function getMenu($locale="sw",$menu_name="main_nav")
	{	

		//$lang  = curlang();
		$menu = Menu::where('category','=','main_nav')->first();
		
		$menu_string = '';

		$title = 'title_en';
		
		if(is_null($menu)){
			return;
		}
		
		$parent_items = $menu->menu_items()->where('parent', '=', 0)->orderBy('position', 'ASC')->get();
		if(!$parent_items){
			return;
		}

		foreach ($parent_items as $parent) {
			
			$child_items = $menu->menu_items()->where('parent','=',$parent->id)->orderBy('position', 'ASC')->get();
			
			if($child_items->count() > 0){
				$menu_string .= "<li class='nav-item dropdown'><a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown' >".__($parent->title_translation,[],$locale)."<b class='caret'></b></a>"
				."<ul class='dropdown-menu drop'>";
				foreach ($child_items as $child) 
				{
					$grands = $menu->menu_items()->where('parent','=',$child->id)->get();
					if($grands->count()){
						$menu_string .= "<li class='nav-item dropdown-submenu'><a class='dropdown-item dropdown-toggle' data-toggle='dropdown' href='#'>".__($child->title_translation,[],$locale)."</a>"
						."<ul class='dropdown-menu'>";
						foreach ($grands as $grand) {
							$menu_string .= "<li><a class='dropdown-item' href= '".url($grand->url)."'>".__($grand->title_translation,[],$locale)."</a></li>";
						
						}
						$menu_string .= "</ul></li>"; 
					}
					else {
						$menu_string .= "<li><a class='dropdown-item' href= '".url($child->url)."'>".__($child->title_translation,[],$locale)."</a></li>";
					}
				}
				$menu_string .= "</ul>";
			}else{
				$menu_string.= "<li class='nav-item'><a class='nav-link' href='".url($parent->url)."'>".__($parent->title_translation,[],$locale)."</a></li>";
			}
			
			$menu_string .= "</li>";
		}
		return $menu_string;
	}
	     
	public function hasChildren(){
		$count = $this::where('parent','=',$this->id)->count();
		if($count){
			return true;
		}

		return false;
	}


	public static function getOtherMenu($menu_name = '', $lang){
		$data = '';
		$title = 'title'.$lang;

		$menu_items = MenuItem::where('menu_name', '=', $menu_name)->where('parent', '=', 0)->get();

		foreach ($menu_items as $menu_item) {
			$data .= "<li ><a href='".URL::to($menu_item->url)."' >".__($menu_item->title_translation)."</a></li>";
		}

		return $data;
	}

	public static function sitemap($menu_name="main_nav", $lang)
	{
		$menu = MenuItem::where('menu_name','=',$menu_name);
		$data = '';
		$title = 'title'.$lang;

		if($menu == null){
			return;
		}
		$parent_items = MenuItem::where('menu_name', '=', $menu_name)->where('parent', '=', 0)->get();
		$num_parent_items = count($parent_items);
		$parent_count = 0;
		$menu_array = array();
		foreach ($parent_items as $parent) {
			$child_items = MenuItem::where('parent','=',$parent->id)->get();
			$num_child_items = count($child_items);
			$child_count = 0;
			
			if($num_child_items > 0){
				$data .= "<li><a href=".URL::to($parent->url).">".__($parent->title_translation)."<b class='caret'></b></a>";
				$data .= '<ul>';
				foreach ($child_items as $child) 
				{
					$grand_childs = MenuItem::where('parent','=',$child->id)->get();
					if(count($grand_childs) > 0){
						$data .="<li><a href=".URL::to($child->url).">".__($child->title_translation)."</a><ul>";
						foreach ($grand_childs as $gr) {
							$grand_grand_childs = $grand_childs = MenuItem::where('parent','=',$gr->id)->get(); 
							if(count($grand_grand_childs) > 0){
								$data .="<li><a href= ".URL::to($gr->url).">".__($gr->title_translation)."</a><ul>";
								foreach ($grand_grand_childs as $key => $gr_gr) {
									$data .= "<li><a href=".URL::to($gr_gr->url).">".__($gr_gr->title_translation)."</a></li>";		
								}
								$data .="</ul></li>";			
							}else{
								$data .= "<li><a href=".URL::to($gr->url).">".__($gr->title_translation)."</a></li>";
							}
						}		
						$data .="</ul></li>";
					}else{
						$data .= "<li><a href= ".URL::to($child->url).">".__($child->title_translation)."</a></li>";
					}
				}
				$data .= '</ul>';
			}else{
				$data.= "<li><a href=".URL::to($parent->url).">".__($parent->title_translation)."</a>";
			}
			
			$data .= "</li>";
		}
		return $data;
	}

	public static function sideBar($id){
		$parent = MenuItem::where('has_sidebar','=',1)->where('id','=',$id)->first();
		if(!$parent)
			return array();
		$sidebar = MenuItem::where('parent','=',$parent->id)->orderBy('position','ASC')->get();
		return $sidebar;
	}
	public static function getKids($id){
		return MenuItem::where('parent','=',$id)->orderBy('position','ASC')->get();
	}
	public static function footerMenu(){
		return MenuItem::where('menu_name','=','footer_menu')->get();
	}

}
