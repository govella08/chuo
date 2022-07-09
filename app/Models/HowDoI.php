<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class HowDoI extends Model implements TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;
	

	protected $guarded=[];

    
    protected $translatableAttributes = ['title', 'content'];

    // validation rules
	public static $rules = [
		'title' => 'required',
		'content' => 'required',
		'active' => 'required',
	];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


	// strong parameters support array
	//protected $fillable = ['title_en', 'title_sw', 'content_en', 'content_sw','active','user_id','slug'];
	protected $indexable = ['title_en', 'title_sw', 'content_en', 'content_sw'];
	protected $urlPrefix = 'howdois';

	public function getTitleEnAttribute($value)
    {
        return __($this->title_translation,[],'en');
    }
    public function getContentEnAttribute($value)
    {
        return __($this->content_translation,[],'en');
    }
}
