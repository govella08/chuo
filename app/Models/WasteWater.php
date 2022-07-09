<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
class WasteWater extends Model implements TrackableInterface {
  use SoftDeletes;
  use TrackableTrait;

  protected $table   =  "wastewater";
  protected $fillable =  ['region_id','user_id','target','achievements','reported','indicator_id'];
  protected $dates   =  ['deleted_at'];

  public static $rules = [
   "achievements" => "required|numeric"
    
  ];

  public function users() {
    return $this->hasMany('App\Models\User', 'region_id', 'id');
  }

   public function region(){
    return $this->belongsTo('App\Models\Region', 'region_id', 'id'); 
  }

  public function target(){
    return $this->belongsTo('App\Models\WastewaterTargets', 'target', 'id'); 
  }
  public function indicator(){
    return $this->belongsTo('App\Models\WasteWaterIndicator', 'indicator_id', 'id'); 
  }
  


}