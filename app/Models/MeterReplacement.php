<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
class MeterReplacement extends Model implements TrackableInterface {
  use SoftDeletes;
  use TrackableTrait;
 // use SoftCascadeTrait;
  protected $table   =  "meter_replacements";
  protected $guarded =  ['id'];
  protected $dates   =  ['deleted_at'];

  // protected $softCascade = ['payables','receivables','activities','facilitytypes','revenueprojections','payers'];

  public static $rules = [
  /* "target" => "required | numeric",*/
   "achievement" => "required | numeric",
   "request_to_ceo" => "required"
    
  ];

  public function users() {
    return $this->hasMany('App\Models\User', 'region_id', 'id');
  }

   public function region(){
    return $this->belongsTo('App\Models\Region', 'region_id', 'id'); 
  }
  public function target(){
    return $this->belongsTo('App\Models\WatersalesTargets', 'target', 'id'); 
  }


}