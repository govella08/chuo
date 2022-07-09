<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class ProjectCategory extends Model implements TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;


	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $guarded=[];

    
    protected $translatableAttributes = ['title'];
	//protected $fillable = ['title_en', 'slug', 'title_sw', 'active'];

	public static $rules = [
		'title' => 'required',
		'active' => ''
	];

	public function getTitleEnAttribute($value)
    {
        return __($this->title_translation,[],'en');
    }

	public function projects(){
		return $this->hasMany('App\Models\Project', 'category_id');
	}

}
