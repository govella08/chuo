<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
class NewConnection extends Model implements TrackableInterface {
  use SoftDeletes;
  use TrackableTrait;
 // use SoftCascadeTrait;
  protected $table   =  "new_connections";
  protected $guarded =  ['id'];
  protected $dates   =  ['deleted_at'];

  public static $rules = [
  // "target" => "required | numeric",
   "achievement" => "required|numeric",
   "applied" => "numeric"
    
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