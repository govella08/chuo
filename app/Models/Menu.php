<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Request;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Menu extends Model implements  TrackableInterface{

    use FormAccessible,TrackableTrait;
    use WaaviTransilation;
	// rules
    public static $rules = [
      'title' => 'required',
      'category' => 'required',
  ];

	//fillables
	//protected $fillable = ['title_en', 'title_sw', 'category', 'status'];
  protected $guarded=[];

  protected $translatableAttributes = ['title'];

  public function menu_items(){
      return $this->hasMany('App\Models\MenuItem');
  }

  public function getTitleEnAttribute($value)
  {
    return __($this->title_translation,[],'en');
}

public static function selectMenu(){

    $pages = [];
    $sectorscategories = [];
    $cardiaccategories = [];
    $administration_categories = [];
    $projectscategories = [];
    $services_all=[];

        //$categories=[];
    //$biographies=array();
    $categories=array();
    $projectcategories=array();
    foreach (Page_category::all() as $cat) {
        $pages[$cat->title_en] = [];
        foreach($cat->pages as $page){
            $pages[$cat->title_en]['pages/'.$page->slug]=$page->title_en;                          
        }
    }

    // foreach (Biography::all() as $bio) {
    //     $biographies['biographies/'.$bio->id]=$bio->title_en;
    // }

    foreach (PublicationCategory::all() as $cat) {
        $categories['publications/'.$cat->id]=$cat->title_en;
    }

    foreach (ProjectCategory::all() as $projcat) {
        $projectcategories['projects/'.$projcat->id]=$projcat->title_en;
    }


    foreach (AdministrationCategories::all() as $admincategory) {
        $administration_categories['administration/'.$admincategory->id]=$admincategory->title_en;
    }

        /*foreach (Service::all() as $service) {
            $services_all['services/'.$service->id]=$service->title_en;
        }*/
        //$biography=['Biography'=>$biographies];
        $publications=['Publications'=>$categories];
        $projects=['Projects'=>$projectcategories];

        $administration = ['Administration' => $administration_categories];

        $services=['Our Services'=>$services_all];
        return array_merge(array('#'=>'None','Modules'=>array(
          //'biography'=>'Profile 2',
          'biography/bio-7'=>'Profile',
          'contactus' => 'Contact Us',
          'department' => "Departments",
          'events'=>"Events",
          'howdois'=>"How do I?",
          'news' => "News",
          'publications' => "Publications",
          'pressreleases' => "Press Releases",
          'regional_offices' => "Regional Offices",
          'speeches' => "Speeches",
          'sections' => "Sections",
          'unit' => "Units",
          'vacancies' => "Vacancies",
      ),
        'Galleries'=>array('galleries/listing/photos/0'=>'Photo gallery', 'galleries/listing/videos'=>'Video Gallery')),
        $publications,
        $projects,
        $services,
        $administration,
        $pages
    );

    }

//model events
	 // public static function boot($events) {
    public static function boot() {

       parent::boot();


       static::deleting(function($menu) {

          if(!$menu->menu_items->count()){
             return true;
         }
         return false;
     });

   }

}
