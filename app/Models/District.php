<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
class District extends Model implements TrackableInterface{
  use SoftDeletes; 
  use TrackableTrait;
 // use SoftCascadeTrait;
  protected $table   =  "districts";
  protected $guarded =  ['id'];
  protected $dates   =  ['deleted_at'];

  // protected $softCascade = ['payables','receivables','activities','facilitytypes','revenueprojections','payers'];

  public static $rules = [
    "district_name" => "required"
  ];

  public function regions() {
    return $this->belongsTo('App\Models\Region','region_id','id');
  }
  
   public function users() {
    return $this->hasMany('App\Models\User', 'district_id', 'id');
  }
}