<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ElasticSearchTrait;
use App\Traits\ElasticSearchInterface;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;

class Newsletter extends Model implements ElasticSearchInterface,TrackableInterface {

    use ElasticSearchTrait;
    use TrackableTrait;
	
	protected $table="newsletters";
	public static $rules = [
		'fullname' => 'required',
		'email' => 'required'
	];

	// strong parameters support array
	protected $fillable = ['fullname', 'email'];
	protected $indexable = ['fullname', 'email'];
	protected $urlPrefix = 'newsletters';
}
