<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
class Region extends Model implements TrackableInterface {
  use SoftDeletes;
  use TrackableTrait;
 // use SoftCascadeTrait;
  protected $table   =  "regions";
  protected $guarded =  ['id'];
  protected $dates   =  ['deleted_at'];

  // protected $softCascade = ['payables','receivables','activities','facilitytypes','revenueprojections','payers'];

  public static $rules = [
    "region_name" => "required"
  ];

  public function users() {
    return $this->hasMany('App\Models\User', 'region_id', 'id');
  }
  
   public function customers() {
        return $this->hasMany('App\Models\CustomerCare','region_id','id');
    }
    public function leakages() {
        return $this->hasMany('App\Models\LeakageControl','region_id','id');
    }
    public function meterreadings() {
        return $this->hasMany('App\Models\MeterReadings','region_id','id');
    }
    public function meterreplacements() {
        return $this->hasMany('App\Models\MeterReplacement','region_id','id');
    }
    public function newconnections() {
        return $this->hasMany('App\Models\NewConnection','region_id','id');
    }
    public function revenuecollections() {
        return $this->hasMany('App\Models\RevenueCollections','region_id','id');
    }
    public function watertargets() {
        return $this->hasMany('App\Models\WaterSalesTargets','region_id','id');
    }
    public function wastewatertargets() {
        return $this->hasMany('App\Models\WastewaterTargets','region_id','id');
    }
    public function watersales() {
        return $this->hasMany('App\Models\Watersales','region_id','id');
    }
    public function waterproductions() {
        return $this->hasMany('App\Models\WaterProduction','region_id','id');
    }

}