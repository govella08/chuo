<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Photo extends Model implements  TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;


	protected $table ='media';

	// validation rules
	public static $rules = [
		'title' => 'required',
		'gallery_id' => 'required',
		'mediaurl' => 'required|image|mimes:jpg,png,jpeg,bmp|max:5120', //video or audio or photo
		//'mediaurl' => 'required|image|mimes:jpg,png,jpeg,bmp|max:2000', //if icon is needed 
	];

	//fillables
	//protected $fillable = ['title_en', 'title_sw', 'mime', 'content_en', 'content_sw', 'path', 'url','gallery_id', 'filename', 'slug','status','show_content'];
	protected $translatableAttributes = ['title','content'];
	protected $guarded=[];

	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'filename'
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
   /* public function getGalleryIdAttribute($value)
    {
        return $this->gallery_id;
    }*/

   public function gallery(){
	return $this->belongsTo('App\Models\Gallery');
   }
	public function image($size=''){
	 	if($size==''){
	 		return $this->path.$this->filename;
	 	}
	 	return $this->path.$size.'_'.$this->filename;
	 }

}
