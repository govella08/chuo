<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class WelcomeNote extends Model implements TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;

	protected $table = "welcome";

	protected $guarded=[];

    
    protected $translatableAttributes = ['summary', 'content'];

     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'summary'
            ]
        ];
    }

	// Add your validation rules here
	public static $rules = [
		 'summary' => 'required|max:300',
		 'content' => 'required'
	];

	public function getContentEnAttribute($value)
    {
        return __($this->content_translation,[],'en');
    }
    public function getSummaryEnAttribute($value)
    {
        return __($this->summary_translation,[],'en');
    }

}
