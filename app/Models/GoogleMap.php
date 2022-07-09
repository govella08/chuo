<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;

class GoogleMap extends Model implements TrackableInterface {

    use TrackableTrait;
    protected $table="google_maps";
    protected $guarded=['id'];
	// validation rules
	public static $rules = [
		'url' => 'required'
	];

}
