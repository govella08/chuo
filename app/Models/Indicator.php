<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
class Indicator extends Model implements TrackableInterface {
  use SoftDeletes;
  use TrackableTrait;
 // use SoftCascadeTrait;
  protected $table   =  "indicators";
  protected $fillable =  ['name'];
  protected $dates   =  ['deleted_at'];

  // protected $softCascade = ['payables','receivables','activities','facilitytypes','revenueprojections','payers'];

  public static $rules = [
    "name" => "required"
  ];

 public function targets(){
    return $this->hasMany('App\Models\WatersalesTargets', 'indicator_id', 'id'); 
  }

}