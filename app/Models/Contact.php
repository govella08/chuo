<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Collective\Html\Eloquent\FormAccessible;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Contact extends Model  implements TrackableInterface{

	use FormAccessible,TrackableTrait;
	use WaaviTransilation;
	//
	protected $guarded=[];
	protected $translatableAttributes = ['physical_address'];

	public static $rules = [
		 'physical_address' => 'required',
		 'phone' => 'required',
		 'fax' => 'required',
		 'email' => 'required'
	];

	public function getPhysicalAddressEnAttribute($value)
    {
        return __($this->physical_address_translation,[],'en');
    }

	public static  $rules_email = [
		'email' => 'required',
		'subject' => 'required|max:250',
		'message' => 'required'
	];
	
	public static function get_info(){
		$contact = Contact::orderBy('id', 'DESC')->take(1)->get();
		return $contact;
	}

}
