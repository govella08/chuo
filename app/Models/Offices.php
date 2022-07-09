<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ElasticSearchTrait;
use App\Traits\ElasticSearchInterface;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;

class Offices extends Model implements ElasticSearchInterface,TrackableInterface {

    use ElasticSearchTrait;
    use TrackableTrait;
	protected $table = 'offices';
	// validation rules
	public static $rules = [
		'name' => 'required',
		'email' => 'required|email'
	];

	// strong parameters support array
	protected $fillable = ['name','user_id', 'active', 'email'];
	protected $indexable = ['name','user_id', 'email'];
	protected $urlPrefix = 'offices';
}
