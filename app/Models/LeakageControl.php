<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
class LeakageControl extends Model implements TrackableInterface {
  use SoftDeletes;
  use TrackableTrait;
 // use SoftCascadeTrait;
  protected $table   =  "leakage_control";
  protected $guarded =  ['id'];
  protected $dates   =  ['deleted_at'];

  // protected $softCascade = ['payables','receivables','activities','facilitytypes','revenueprojections','payers'];

  public static $rules = [
   "number_of_leakage" => "required | numeric",
   "areas" => "required",
   "number_of_fixed" => "required | numeric",
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