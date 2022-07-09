<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;
use Laravel\Scout\Searchable;

class Service extends Model implements TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;
	
    //scout searching trait
    use Searchable;
    public $asYouType = true;


    protected $guarded=[];
    
    protected $translatableAttributes = ['title', 'summary', 'content'];
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static $rules = [	
      'title' => 'required|max:191',
      'summary' => 'required',
      'content' => 'required',
      'photo_url' => 'required|sometimes|mimes:jpg,png,jpeg,bmp|max:4096'
  ];

/*	public function category(){
		return $this->belongsTo('App\Models\MainCategory', 'category_id');
	}*/

	public function getTitleEnAttribute($value)
    {
        return __($this->title_translation,[],'en');
    }
    public function getContentEnAttribute($value)
    {
        return __($this->content_translation,[],'en');
    }
    public function getSummaryEnAttribute($value)
    {
        return __($this->summary_translation,[],'en');
    }

}
