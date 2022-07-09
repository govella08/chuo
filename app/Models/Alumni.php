<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Laravel\Scout\Searchable;

class Alumni extends Model implements TrackableInterface
{
    use Sluggable,SluggableScopeHelpers;
	use TrackableTrait,WaaviTransilation,FormAccessible;
    
    //scout searching trait
    use Searchable;
    public $asYouType = true;

	protected $guarded=[];
    protected $translatableAttributes = ['title','alumni'];

    //configure data to be seen during searching
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }

    public function sluggable()
    {
        return [
            'slugy' => [
                'source' => 'fullname'
            ]
        ];
    }
    
	
	public static $rules = [
	'fullname' => 'required',
	'title' => 'required|max:190',
	'alumni' => 'required',
	'photo_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
    ];
    
    public function getTitleEnAttribute($value)
    {
        return __($this->title_translation,[],'en');
    }
    public function getAlumniEnAttribute($value)
    {
        return __($this->alumni_translation,[],'en');
    }

}
