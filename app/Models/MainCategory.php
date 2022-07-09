<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class MainCategory extends Model implements TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;


	protected $table ='service_categories';
	protected $guarded=[];
	//protected $fillable = ['title_en', 'slug', 'title_sw', 'active'];

	protected $translatableAttributes = ['title'];

	public static $rules = [
		'title' => 'required',
		'active' => 'required'
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

	public function services(){
		return $this->hasMany('App\Models\Service', 'category_id');
		return $this->hasMany('App\Models\Guideline', 'category_id');
	}

}
