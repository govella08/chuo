<?php

namespace App;

use App\Traits\TrackableTrait;
use Collective\Html\Eloquent\FormAccessible;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Highlight extends Model
{
    use FormAccessible,TrackableTrait;
    use WaaviTransilation;

    protected $guarded=[];


    protected $translatableAttributes = ['title', 'content'];

    public static $rules = [
        'title' => 'required',
        'content' => 'required',
        'active' => 'required'
    ];

    /*public function category(){
        return $this->belongsTo('App\Models\PublicationCategory', 'category_id');
    }
*/

    public function getTitleEnAttribute($value)
    {
        return __($this->title_translation,[],'en');
    }
    public function getContentEnAttribute($value)
    {
        return __($this->content_translation,[],'en');
    }
}
