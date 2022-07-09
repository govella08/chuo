<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Unit extends Model implements TrackableInterface{

	use FormAccessible,TrackableTrait;
	use WaaviTransilation;

	protected $guarded=[];

	protected $translatableAttributes = ['dept_name', 'content'];

    public static $rules = [
		'dept_name' => 'required|max:191',
		'content' => 'required',
	];


	public function getDeptNameEnAttribute($value)
    {
        return __($this->dept_name_translation,[],'en');
    }
    public function getContentEnAttribute($value)
    {
        return __($this->content_translation,[],'en');
    }
}

