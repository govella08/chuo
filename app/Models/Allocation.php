<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Allocation extends Model implements TrackableInterface
{
    use FormAccessible,TrackableTrait;
	use WaaviTransilation;
	
	protected $guarded=[];

    protected $translatableAttributes = ['title', 'doc'];

    public static $rules = [
		'description' => 'required',
		'doc' => 'required|max:4096',
	];

	public function getDescriptionEnAttribute($value)
    {
        return __($this->title_translation,[],'en');
    }

    public function getDocEnAttribute($value)
    {
        return __($this->title_translation,[],'en');
    }
}
