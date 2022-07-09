<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
class WastewaterTargets extends Model implements TrackableInterface {
  use SoftDeletes;
  use TrackableTrait;
 // use SoftCascadeTrait;
  protected $table   =  "wastewater_target";
  protected $guarded =  ['id'];
  protected $dates   =  ['deleted_at'];

  // protected $softCascade = ['payables','receivables','activities','facilitytypes','revenueprojections','payers'];

  public static $rules = [
   "target" => "required |numeric",
   
  ];

  public function users() {
    return $this->hasMany('App\Models\User', 'region_id', 'id');
  }

   public function region(){
    return $this->belongsTo('App\Models\Region', 'region_id', 'id'); 
  }

   public function indicator(){
    return $this->belongsTo('App\Models\WastewaterIndicator', 'indicator_id', 'id'); 
  } 

  public function wastewaters(){
    return $this->hasMany('App\Models\WasteWater', 'target', 'id'); 
  }



}