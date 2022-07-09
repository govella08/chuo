<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class RelatedLink extends Model implements  TrackableInterface{

	use FormAccessible,TrackableTrait;
	use WaaviTransilation;

	protected $guarded=[];

    
    protected $translatableAttributes = ['title'];

	public static $rules = [
		'title'	=> 'required',
		'url'	=> 'required'
	];

	public function getTitleEnAttribute($value)
    {
        return __($this->title_translation,[],'en');
    }

}
