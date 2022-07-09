<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Collective\Html\Eloquent\FormAccessible;
//use Spatie\Activitylog\Traits\LogsActivity;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;
/*use App\Traits\ElasticSearchTrait;
use App\Traits\ElasticSearchInterface;*/
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;

class Administration extends Model implements /*ElasticSearchInterface,*/ TrackableInterface {

	//use ElasticSearchTrait;

	use TrackableTrait,WaaviTransilation,FormAccessible;
	
	protected $guarded=[];
	protected $translatableAttributes = ['title','content'];
	//protected $fillable = ['fullname','title_en','title_sw','content_en','content_sw','photo_url','category_id', 'user_id','position'];

	protected $indexable = 	  ['fullname','title','content'];
	//protected $urlUniqueField = ['file'=>['translate'=>true,'generateURL'=>false]];//optional

	public function getTitleEnAttribute($value)
    {
        return __($this->title_translation,[],'en');
    }
    public function getContentEnAttribute($value)
    {
        return __($this->content_translation,[],'en');
    }

    
	public static $rules = [
	'fullname' => 'required',
	'title' => 'required|max:190',
	'content' => 'required',
	'position' => 'required',
	'category_id' => 'required',
	'group_id' => 'required',
	'email' => '',
	'photo_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
	];

	public function category(){
		return $this->belongsTo('App\Models\AdministrationCategories', 'category_id');
	}
	public static function category_name($id){
		return AdministrationCategories::where('id',$id)->first()->title_en;
	}

	public function group(){
		return $this->belongsTo('App\Models\AdministrationGroups', 'group_id');
	}

	public static function group_name($id){
		return AdministrationGroups::where('id',$id)->first()->title_en;
	}
}
