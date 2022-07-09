<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
class WatersalesTargets extends Model implements TrackableInterface {
  use SoftDeletes;
  use TrackableTrait;
 // use SoftCascadeTrait;
  protected $table   =  "watersales_target";
  protected $guarded =  ['id'];
  protected $dates   =  ['deleted_at'];

  // protected $softCascade = ['payables','receivables','activities','facilitytypes','revenueprojections','payers'];

  public static $rules = [
   "target" => "required | numeric",
   
  ];

  public function users() {
    return $this->hasMany('App\Models\User', 'region_id', 'id');
  }

   public function region(){
    return $this->belongsTo('App\Models\Region', 'region_id', 'id'); 
  }

   public function indicator(){
    return $this->belongsTo('App\Models\Indicator', 'indicator_id', 'id'); 
  } 

  public function customers() {
        return $this->hasMany('App\Models\CustomerCare','user_id','id');
    }
    public function leakages() {
        return $this->hasMany('App\Models\LeakageControl','user_id','id');
    }
    public function meterreadings() {
        return $this->hasMany('App\Models\MeterReadings','user_id','id');
    }
    public function meterreplacements() {
        return $this->hasMany('App\Models\MeterReplacement','user_id','id');
    }
    public function newconnections() {
        return $this->hasMany('App\Models\NewConnection','user_id','id');
    }
    public function revenuecollections() {
        return $this->hasMany('App\Models\RevenueCollections','user_id','id');
    }
    public function watertargets() {
        return $this->hasMany('App\Models\WaterSalesTargets','user_id','id');
    }
    public function wastewatertargets() {
        return $this->hasMany('App\Models\WastewaterTargets','user_id','id');
    }
    public function watersales() {
        return $this->hasMany('App\Models\Watersales','user_id','id');
    }
    public function waterproductions() {
        return $this->hasMany('App\Models\WaterProduction','user_id','id');
    }


}