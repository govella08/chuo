<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
//use Spatie\Activitylog\Traits\LogsActivity;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;
/*use App\Traits\ElasticSearchTrait;
use App\Traits\ElasticSearchInterface;*/
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;

class Aboutus extends Model implements /*ElasticSearchInterface,*/TrackableInterface {

    //use ElasticSearchTrait;
	use Sluggable,SluggableScopeHelpers;
	use TrackableTrait;

	protected $table = "aboutus";
	protected $guarded=[];
	//protected $fillable = ['title_en','tags', 'title_sw','content_en', 'content_sw','active','user_id', 'photo_url', 'visible', 'slug'];
	protected $translatableAttributes = ['title', 'content'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


	protected $indexable = 	  ['title',  'content','slug'];
	// protected $urlUniqueField = ['slug'=>['translate'=>false,'generateURL'=>true]];//optional
	protected $urlUniqueField = ['slug'=>['translate'=>false,'generateURL'=>true]];//optional
	 // protected $urlPrefix = 'pages';//optional


	// Add your validation rules here
	public static $rules = [
		 'title' => 'required|max:191',
		 'content' => 'required',
		 'active' => 'required',
		 'content_sw' => 'required',
		 'photo_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
	];

}
