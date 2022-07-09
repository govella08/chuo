<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;

class StaffEmail extends Model implements TrackableInterface {

    use TrackableTrait;
    protected $table="staff_email_links";
    protected $guarded=['id'];
	// validation rules
	public static $rules = [
		'url' => 'required'
	];

}
