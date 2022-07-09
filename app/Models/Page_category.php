<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;
class Page_category extends Model implements TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;

	// validation rules
	public static $rules = [
		'title' => 'required',
		'slug' => '',
	];

	//fillables
	//protected $fillable = ['title', 'title', 'status','slug','modifiable'];
	protected $guarded=[];

	protected $translatableAttributes = ['title'];

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
//model events
	 // public static function boot($events) {
	 public static function boot() {

	    parent::boot();


	  static::deleting(function($category) {

	    	if($category->modifiable){
	    		return true;
	    	}
	    	if($category->modifiable && !$category->pages->count()){
	    		return true;
	    	}
	    	return false;
	    });

	}


	public function pages(){
		return $this->hasMany('App\Models\Page');

	 }


}
