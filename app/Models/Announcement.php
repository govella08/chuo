<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
//use Spatie\Activitylog\Traits\LogsActivity;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;
use Laravel\Scout\Searchable;

class Announcement extends Model implements TrackableInterface {

	use TrackableTrait,FormAccessible;
	use Sluggable,SluggableScopeHelpers,WaaviTransilation;

//scout searching trait
    use Searchable;
    public $asYouType = true;


    protected $guarded=[];

    protected $translatableAttributes = ['name', 'content'];

    public static $rules = [
      'name'   => 'required|max:320',
      'content' => 'required',
      'active' => 'required'
  ];

  public function sluggable()
  {
    return [
        'slug' => [
            'source' => 'name'
        ]
    ];
}

public function getNameEnAttribute($value)
{
    return __($this->name_translation,[],'en');
}
public function getContentEnAttribute($value)
{
    return __($this->content_translation,[],'en');
}


	// Don't forget to fill this array
	//protected $fillable = ['name', 'content', 'active','slug'];


}
