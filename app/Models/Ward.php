<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;
class Ward extends Model implements TrackableInterface {
  use SoftDeletes;
  use TrackableTrait;
 // use SoftCascadeTrait;
  protected $table   =  "wards";
  protected $fillable =  ['ward_name','district_id'];
  protected $dates   =  ['deleted_at'];

  // protected $softCascade = ['payables','receivables','activities','facilitytypes','revenueprojections','payers'];

  public static $rules = [
    "ward_name" => "required"
  ];

  public function districts() {
    return $this->belongsTo('App\Models\District','district_id','id');
  }

  public function villages() {
    return $this->hasMany('App\Models\Village', 'ward_id', 'id');
  }

}