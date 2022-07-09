<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;
use Laravel\Scout\Searchable;

class Event extends Model implements TrackableInterface {

	use Sluggable,FormAccessible,SluggableScopeHelpers;
	use TrackableTrait,WaaviTransilation;


    //scout searching trait
    use Searchable;
    public $asYouType = true;

    //configure index
    

    //configure data to be seen during searching
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = "events";
    protected $guarded=[];
    protected $translatableAttributes = ['title', 'location','description', 'participants','objectives'];
    /*protected $fillable = ['title_en', 'title_sw', 'description_en', 'description_sw', 'start_date', 'end_date','start_time','end_time', 'fee', 'location', 'infophone', 'infoemail', 'slug', 'status', 'flier', 'visible', 'user_id','participants','objectives'];*/


	// Add your validation rules here
    public static $rules = [
     'title' 		=> 'required',
     'description' 	=> 'required',
     'start_date' 	=> 'required|date',
     'end_date' 	=> 'required|date',
     'start_time' 		=> 'required',
     'end_time' 		=> 'required',
     'location' 		=> 'required',
     'participants' 		=> 'required',
     'objectives' 		=> 'required',
     'flier'		=> 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
 ];


 public function getTitleEnAttribute($value)
 {
    return __($this->title_translation,[],'en');
}
public function getDescriptionEnAttribute($value)
{
    return __($this->description_translation,[],'en');
}
public function getLocationEnAttribute($value)
{
    return __($this->location_translation,[],'en');
}
public function getParticipantsEnAttribute($value)
{
    return __($this->participants_translation,[],'en');
}
public function getObjectivesEnAttribute($value)
{
    return __($this->objectives_translation,[],'en');
}

}
