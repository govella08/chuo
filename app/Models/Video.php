<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Video extends Model implements  TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;

	protected $table ='media';

	// validation rules
	public static $rules = [
		'title' => 'required',
		'url' => '',
		'gallery_id' => 'required',
		//'type' => 'required', //video or audio or photo
		//'iconurl' => 'mimes:jpg,png,jpeg,bmp|max:2000', //if icon is needed 
	];

	//fillables
	//protected $fillable = ['title_en', 'title_sw', 'content_en', 'content_sw', 'mime', 'path', 'url','gallery_id', 'filename', 'iconurl', 'slug','status'];

	protected $translatableAttributes = ['title','content'];
	protected $guarded=[];

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
    

}
