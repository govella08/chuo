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

class News extends Model implements TrackableInterface{

	use Sluggable,FormAccessible,TrackableTrait;
	use WaaviTransilation,SluggableScopeHelpers;

    //scout searching trait
    use Searchable;
    public $asYouType = true;

    protected $table = "news";
    protected $guarded=[];

    
    protected $translatableAttributes = ['title', 'summary', 'content'];



    // Add your validation rules here
    public static $rules = [
       'title' => 'required',
       'summary' => 'required',
       'content' => 'required',
       'active' => 'required',
       'photo_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
   ];


	//protected static $logUnguarded = true;

   public function sluggable()
   {
    return [
        'slug' => [
            'source' => 'title'
        ]
    ];
}

    /*
    public function getContentTranslationAttribute($value)
    {
        return __($value,[],'en');
    }*/

    public function getTitleEnAttribute($value)
    {
        return __($this->title_translation,[],'en');
    }
    public function getContentEnAttribute($value)
    {
        return __($this->content_translation,[],'en');
    }
    public function getSummaryEnAttribute($value)
    {
        return __($this->summary_translation,[],'en');
    }



    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
