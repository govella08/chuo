<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Biography extends Model implements TrackableInterface {

   use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;

	protected $guarded=[];
	// validation rules
	public static $rules = [
		'title' => 'required',
		'name' => 'required',
		'salutation' => 'required',
		'content' => 'required',
		
		'active' => 'required'
	];

	//fillables
	//protected $fillable = ['title_en', 'title_sw', 'salutation_en', 'salutation_sw', 'content_en', 'content_sw','photourl','name','active','side','slug'];
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
    public function getContentEnAttribute($value)
    {
        return __($this->content_translation,[],'en');
    }
    public function getSalutationEnAttribute($value)
    {
        return __($this->salutation_translation,[],'en');
    }

    protected $translatableAttributes = ['title', 'salutation', 'content'];

	//protected $indexable = 	  ['title_en', 'title_sw',  'content_en', 'content_sw', 'slug', 'name'];
	
	protected $urlUniqueField = ['slug'=>['translate'=>false,'generateURL'=>true]];//optional
	 
	public static function bio(){
		$biography = Biography::orderBy('id','ASC')->take(2)->get();
		$biography = ($biography)?$biography:new Biography();
        $biography->photourl = ($biography->photourl)?$biography->photourl:'/cms/images/person.png';
        return $biography;
	}

}
