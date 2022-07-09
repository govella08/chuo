<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Laravel\Scout\Searchable;

class Level extends Model implements TrackableInterface
{
    use FormAccessible;
	use TrackableTrait;


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


    protected $guarded=[];

    // Add your validation rules here
    public static $rules = [
        'name' 		=> 'required'
    ];
}
