<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;

class Complaint extends Model implements  TrackableInterface {
	use TrackableTrait;
	protected $fillable = ['names','email','phone','category','subject','message','created_at','updated_at'];

	public static  $rules = [
		'email' => 'required',
		'subject' => 'required|max:250',
		'category'=>'required',
		'message' => 'required'
	];

}
