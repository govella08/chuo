<?php namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\District;
use App\Models\Ward;
use App\Models\PointType;

use Response;
use Validator;
use Redirect;
use Auth;
use DB;
use Datatables; 
use Crypt;

class ReportsController extends Controller {

	public function index()
	{		
		
        $regions = Region::orderBy('region_name','=','ASC')->pluck("region_name","id")->all();
		$point_type_id = PointType::orderBy('name','=','ASC')->pluck("name","id")->all();
         $district_id=array();
         $ward_id=array();
         $data=array();
          $fiber_termination=array();
         $halotel_project=array();
         return view('system.reports.index',compact('regions','district_id','ward_id','data','point_type_id','fiber_termination','halotel_project'));        
    }

    public function getPointsData(Request $request){
      $data = $request->all();

      $region_id=$data['id'];
      $district_id=$data['district_id'];
      $ward_id=$data['ward_id']; 
      $point_type_id=$data['point_type_id']; 
      $halotel_tower=$data['halotel_tower']; 
      $fiber_termination=$data['fiber_termination']; 
      $halotel_project=$data['halotel_project']; 

        $data = DB::table("points_datas");
         //->select("points_datas.location_name,points_datas.coverage_area")
         $data = $data->join("villages","villages.id","=","points_datas.village_id");
         $data = $data->join("wards","wards.id","=","villages.ward_id");
         $data = $data->join("districts","wards.district_id","=","districts.id");
         $data = $data->join("regions","regions.id","=","districts.region_id");
          if(is_numeric($point_type_id)){
         $data = $data->join("point_types","point_types.id","=","points_datas.point_type_id");
          }
         if(is_numeric($region_id)){
         $data = $data->where("regions.id",'=',$region_id); 
         }
         if(is_numeric($district_id)){
         $data = $data->where("districts.id",'=',$district_id); 
         }
         if(is_numeric($ward_id)){
         $data = $data->where("wards.id",'=',$ward_id); 
         }

         if(is_numeric($point_type_id)){
         $data = $data->where("points_datas.point_type_id",'=',$point_type_id); 
         }
         if(is_numeric($halotel_tower)){
         $data = $data->where("points_datas.halotel_tower",'=',$halotel_tower); 
         }

         if(is_numeric($fiber_termination)){
         $data = $data->where("points_datas.fiber_termination",'=',$fiber_termination); 
         }
         if(is_numeric($halotel_project)){
         $data = $data->where("points_datas.halotel_project",'=',$halotel_project); 
         }
         $data = $data->get();

        $regions = Region::orderBy('region_name','=','ASC')->pluck("region_name","id")->all();
         $district_id=array();
         $ward_id=array();
         $fiber_termination=array();
         $halotel_project=array();
         $point_type_id = PointType::orderBy('name','=','ASC')->pluck("name","id")->all();

        return view("system.reports.index", compact('data','regions','district_id','ward_id','point_type_id','fiber_termination','halotel_project'));
}


}
