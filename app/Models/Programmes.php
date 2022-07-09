<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Collective\Html\Eloquent\FormAccessible;
//use Spatie\Activitylog\Traits\LogsActivity;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;

class Programmes extends Model implements TrackableInterface
{
    use Sluggable,FormAccessible,SluggableScopeHelpers;
    use TrackableTrait,WaaviTransilation;

    protected $guarded=[];
	protected $translatableAttributes = ['name','description'];
	//protected $fillable = ['fullname','title_en','title_sw','content_en','content_sw','photo_url','category_id', 'user_id','position'];

    //protected $indexable = 	  ['name'];

    public function sluggable()
    {
        return [
            'slugy' => [
                'source' => 'name'
            ]
        ];
    }

    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'level_id' => 'required',
    ];

    public function level(){
		return $this->belongsTo('App\Models\Level', 'level_id');
    }

    public static function level_name($id){
        return Level::where('id', $id)->first()->name;
    }
    
    public function getNameEnAttribute($value){
        return __($this->name_translation,[],'en');
    }

    public function getDescriptionEnAttribute($value){
        return __($this->description_translation,[],'en');
    }

}
