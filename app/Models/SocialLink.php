<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
class SocialLink extends Model implements  TrackableInterface  {
	use TrackableTrait;
	protected $fillable = ['title', 'url'];

	public static $rules = [
		 'title' => 'required',
		 'url' => 'required'
	];


}
