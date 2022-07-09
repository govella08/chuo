<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
class Translation extends Model  implements  TrackableInterface{
use TrackableTrait;

protected $table = 'translator_translations';

	// Don't forget to fill this array
/*	protected $fillable = [
		'en'
		,'sw'
		,'keyword'
		,'created_at'
		,'updated_at'
		];

	public static function lang($lang){
		$trans = self::lists($lang,'keyword');
		return $trans;

	}*/

}