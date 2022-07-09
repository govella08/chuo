<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
class WasteWaterIndicator extends Model implements TrackableInterface {
  use SoftDeletes;
  use TrackableTrait;
 // use SoftCascadeTrait;
  protected $table   =  "wastewater_indicators";
  protected $fillable =  ['name'];
  protected $dates   =  ['deleted_at'];

  // protected $softCascade = ['payables','receivables','activities','facilitytypes','revenueprojections','payers'];

  public static $rules = [
    "name" => "required"
  ];

 public function targets(){
    return $this->hasMany('App\Models\WastewaterTargets', 'indicator_id', 'id'); 
  }
  public function indicators(){
    return $this->hasMany('App\Models\Wastewater', 'indicator_id', 'id'); 
  }

}