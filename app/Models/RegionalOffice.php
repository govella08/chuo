<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class RegionalOffice extends Model implements TrackableInterface{

    use Sluggable,FormAccessible,TrackableTrait;
    use WaaviTransilation,SluggableScopeHelpers;
    
    protected $table = 'regional_offices';
  
    protected $guarded=[];

    
    protected $translatableAttributes = ['physical_address', 'content'];

    public static $rules = [
        'name' => 'required',
        'physical_address' => 'required',
        'phone' => 'required',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getPhysicalAddressEnAttribute($value)
    {
        return __($this->physical_address_translation,[],'en');
    }
    public function getContentEnAttribute($value)
    {
        return __($this->content_translation,[],'en');
    }

}