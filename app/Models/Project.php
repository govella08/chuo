<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;
use Laravel\Scout\Searchable;


class Project extends Model implements TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;

  //scout searching trait
  use Searchable;
  public $asYouType = true;


  protected $table="projects";

	//protected $fillable = ['title_en', 'title_sw', 'content_en', 'content_sw', 'file_sw', 'file_en','active','category_id', 'start_date', 'end_date', 'user_id','slug','duration_en','duration_sw','owner','sponsor','project_status','slug'];

  protected $guarded=[];


  protected $translatableAttributes = ['title', 'file', 'content','duration'];

  public static $rules = [
    'title' => 'required',
    'content' => 'required',
    'file' => 'required',
    'active' => 'required',
    'start_date' => 'required',
    'end_date' => 'required',
    'area_of_coverage' => 'required',
    'number_of_beneficiaries' => 'required|numeric',
    'implementer' => 'required',
  ];

  public function sluggable()
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }


  public function getTitleEnAttribute($value)
  {
    return __($this->title_translation,[],'en');
  }
  public function getFileEnAttribute($value)
  {
    return __($this->file_translation,[],'en');
  }
  public function getContentEnAttribute($value)
  {
    return __($this->content_translation,[],'en');
  }
  public function getDurationEnAttribute($value)
  {
    return __($this->duration_translation,[],'en');
  }

  public function category(){
    return $this->belongsTo('App\Models\ProjectCategory', 'category_id');
  }

}
