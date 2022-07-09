<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class PublicationCategory extends Model implements TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;

	protected $guarded=[];

    
    protected $translatableAttributes = ['title'];

	public static $rules = [
		'title' => 'required',
		'active' => ''
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


	public function publications(){
		return $this->hasMany('App\Models\Publication', 'category_id');
	}

}
