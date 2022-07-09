<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Tender extends Model implements TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;

	protected $guarded=[];

    
    protected $translatableAttributes = ['title', 'summary', 'file'];

	// validation rules
	public static $rules = [
		'title' => 'required|max:191',
		'summary' => 'required',
		'file' => 'required|max:2000',
		'deadline' => 'required',
		'published' => 'required',
		'visible' => 'required'
	];


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
    public function getFileEnAttribute($value)
    {
        return __($this->file_translation,[],'en');
    }
    public function getSummaryEnAttribute($value)
    {
        return __($this->summary_translation,[],'en');
    }

}
