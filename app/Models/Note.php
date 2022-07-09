<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Note extends Model implements TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;
	// validation rules
	public static $rules = [
		'title' => 'required',
		'name' => 'required',
		'salutation' => 'required',
		'content' => 'required',
		'photourl' => 'mimes:jpg,png,jpeg,bmp|max:2000',
	];

	protected $table = 'note';
	protected $guarded=[];

    
    protected $translatableAttributes = ['title', 'salutation', 'content'];

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
    public function getContentEnAttribute($value)
    {
        return __($this->content_translation,[],'en');
    }
    public function getSalutationEnAttribute($value)
    {
        return __($this->salutation_translation,[],'en');
    }

	//protected $indexable = 	  ['title_en', 'title_sw',  'content_en', 'content_sw', 'slug', 'name'];
	// protected $urlUniqueField = ['slug'=>['translate'=>false,'generateURL'=>true]];//optional
	protected $urlUniqueField = ['slug'=>['translate'=>false,'generateURL'=>true]];//optional
	 // protected $urlPrefix = 'pages';//optional
	public static function note(){
		$note = Note::all()->first();
		$note = ($note)?$note:new Note();
        $note->photourl = ($note->photourl)?$note->photourl:'/cms/images/person.png';
        return $note;
	}

}
