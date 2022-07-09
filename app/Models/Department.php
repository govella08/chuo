<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Department extends Model implements TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;

    public static $rules = [
		'dept_name' => 'required',
		'content' => 'required',
	];

	protected $guarded=[];
	protected $translatableAttributes = ['dept_name', 'content'];

	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'dept_name'
            ]
        ];
    }

	public function getDeptNameEnAttribute($value)
    {
        return __($this->dept_name_translation,[],'en');
    }
    public function getContentEnAttribute($value)
    {
        return __($this->content_translation,[],'en');
    }
   

	//protected $fillable = ['deptName_en', 'deptName_sw', 'content_en', 'content_sw', 'user_id'];
	//protected $indexable = ['deptName_en', 'deptName_sw', 'content_en', 'content_sw'];
	protected $urlPrefix = 'department';

}

