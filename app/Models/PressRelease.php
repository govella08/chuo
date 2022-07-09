<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class PressRelease extends Model implements TrackableInterface{

	use FormAccessible,TrackableTrait;
	use WaaviTransilation;

	protected $guarded=[];

    
    protected $translatableAttributes = ['title', 'file'];

	public static $rules = [
		'title' => 'required',
		'file' => 'required|mimes:pdf|max:10000',
		'active' => 'required',
		'published_date' => 'required'
	];

	public function getTitleEnAttribute($value)
    {
        return __($this->title_translation,[],'en');
    }
    public function getFileEnAttribute($value)
    {
        return __($this->file_translation,[],'en');
    }


	/*public function category(){
		return $this->belongsTo('App\Models\PublicationCategory', 'category_id');
	}
*/
}
