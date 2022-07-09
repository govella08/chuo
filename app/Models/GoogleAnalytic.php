<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;

class GoogleAnalytic extends Model implements TrackableInterface {

    use TrackableTrait;
    protected $table="google_analytics";
    protected $guarded=['id'];
	// validation rules
	public static $rules = [
		'url' => 'required'
	];

}
