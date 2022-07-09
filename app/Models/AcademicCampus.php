<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;
use Laravel\Scout\Searchable;

class AcademicCampus extends Model implements TrackableInterface
{
    use Sluggable,FormAccessible,SluggableScopeHelpers;
    use TrackableTrait,WaaviTransilation;
    
    //scout searching trait
    use Searchable;
    public $asYouType = true;

    //configure index
    

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
                'source' => 'name'
            ]
        ];
    }

    protected $guarded=[];
    protected $translatableAttributes = ['name','summary','content'];

    // Add your validation rules here
    public static $rules = [
        'name'  =>  'required',
        'summary'   =>  'required',
        'content'   =>  'required'
    ];

    public function getNameEnAttribute($value){
        return __($this->name_translation,[],'en');
    }

    public function getSummaryEnAttribute($value){
        return __($this->summary_translation,[],'en');
    }

    public function getContentEnAttribute($value){
        return __($this->content_translation,[],'en');
    }
}
