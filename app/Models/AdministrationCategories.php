<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
//use Spatie\Activitylog\Traits\LogsActivity;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;

class AdministrationCategories extends Model implements TrackableInterface {

	use Sluggable,SluggableScopeHelpers;
	use TrackableTrait,FormAccessible,WaaviTransilation;

	protected $guarded=[];
	protected $translatableAttributes = ['title'];
	protected $fillable = ['title', 'title_sw', 'slug', 'active', 'has_label'];

	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

	//protected $fillable = ['title', 'title_sw', 'slug', 'active'];

	public static $rules = [
		'title' => 'required',
		'active' => ''
	];


    public function getTitleEnAttribute($value)
    {
        return __($this->title_translation,[],'en');
    }

	public function administration(){
		return $this->hasMany('App\Models\Administration', 'category_id');
	}

}
