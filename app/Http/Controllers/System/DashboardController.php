<?php namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Indicator;

use Response;
use Validator;
use Redirect;
use Auth;
use DB;

class DashboardController extends Controller {

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)

     {

        $query =  DB::table('roles');
        $query =  $query->select('roles.name');
        $query =  $query->join('role_user','role_user.role_id','=','roles.id');
        $query =  $query->join('users','users.id','=','role_user.user_id');
        $query =  $query->where('users.id','=',Auth::user()->id);
        $result = $query->first();

        //NEW CONNECTION
        $datanc = DB::table("new_connections as n");
        $datanc = $datanc->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'),"n.applied");
        $datanc = $datanc->join("watersales_target as w","w.id","=","n.target");
        $datanc = $datanc->join("regions as r","r.id","=","n.region_id");
        $datanc = $datanc->where("w.indicator_id",'=',NEW_CONNECTION); 
        $datanc = $datanc->where("n.deleted_at",'=',null); 
        $datanc = $datanc->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datanc = $datanc->where(DB::raw('MONTH(n.created_at)'),'=',date('m')); 

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin' ){
            $datanc = $datanc->where("r.id",'=',Auth::user()->region_id); 
        }
        $datanc = $datanc->groupBy("w.target","r.region_name","n.applied"); 
        $datanc = $datanc->get();

         //WATER SALES
        $datawc = DB::table("water_sales as n");
        $datawc = $datawc->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datawc = $datawc->join("watersales_target as w","w.id","=","n.target");
        $datawc = $datawc->join("regions as r","r.id","=","n.region_id");
        $datawc = $datawc->where("w.indicator_id",'=',WATER_SALES);
        $datawc = $datawc->where("n.deleted_at",'=',null); 
        $datawc = $datawc->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datawc = $datawc->where(DB::raw('MONTH(n.created_at)'),'=',date('m')); 

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datawc = $datawc->where("r.id",'=',Auth::user()->region_id); 
        }
        $datawc = $datawc->groupBy("w.target","r.region_name"); 
        $datawc = $datawc->get();

         //METER READINGS
        $datamr = DB::table("meter_readings as n");
        $datamr = $datamr->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datamr = $datamr->join("watersales_target as w","w.id","=","n.target");
        $datamr = $datamr->join("regions as r","r.id","=","n.region_id");
        $datamr = $datamr->where("w.indicator_id",'=',METER_READINGS);
        $datamr = $datamr->where("n.deleted_at",'=',null);
        $datamr = $datamr->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datamr = $datamr->where(DB::raw('MONTH(n.created_at)'),'=',date('m'));

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datamr = $datamr->where("r.id",'=',Auth::user()->region_id); 
        } 
        $datamr = $datamr->groupBy("w.target","r.region_name"); 
        $datamr = $datamr->get();

         //METER REPLACEMENTS
        $datar = DB::table("meter_replacements as n");
        $datar = $datar->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datar = $datar->join("watersales_target as w","w.id","=","n.target");
        $datar = $datar->join("regions as r","r.id","=","n.region_id");
        $datar = $datar->where("w.indicator_id",'=',METER_REPLACEMENT); 
        $datar = $datar->where("n.deleted_at",'=',null); 
        $datar = $datar->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datar = $datar->where(DB::raw('MONTH(n.created_at)'),'=',date('m'));

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datar = $datar->where("r.id",'=',Auth::user()->region_id); 
        }
        $datar = $datar->groupBy("w.target","r.region_name"); 
        $datar = $datar->get();

         //METER REVENUE COLLECTION
        $datarv = DB::table("revenue_collections as n");
        $datarv = $datarv->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'),DB::raw('SUM(n.other_payments)total_other_payments'));
        $datarv = $datarv->join("watersales_target as w","w.id","=","n.target");
        $datarv = $datarv->join("regions as r","r.id","=","n.region_id");
        $datarv = $datarv->where("w.indicator_id",'=',REVENUE_CONNECTION);
        $datarv = $datarv->where("n.deleted_at",'=',null); 
        $datarv = $datarv->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datarv = $datarv->where(DB::raw('MONTH(n.created_at)'),'=',date('m'));

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datarv = $datarv->where("r.id",'=',Auth::user()->region_id); 
        }
        $datarv = $datarv->groupBy("w.target","r.region_name"); 
        $datarv = $datarv->get(); 

         //WATER PRODUCTIONS
        $datawp = DB::table("water_productions as n");
        $datawp = $datawp->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datawp = $datawp->join("watersales_target as w","w.id","=","n.target");
        $datawp = $datawp->join("regions as r","r.id","=","n.region_id");
        $datawp = $datawp->where("w.indicator_id",'=',WATER_PRODUCTION);
        $datawp = $datawp->where("n.deleted_at",'=',null); 
        $datawp = $datawp->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datawp = $datawp->where(DB::raw('MONTH(n.created_at)'),'=',date('m'));

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datawp = $datawp->where("r.id",'=',Auth::user()->region_id); 
        }
        $datawp = $datawp->groupBy("w.target","r.region_name"); 
        $datawp = $datawp->get(); 

        
         //LEAKAGE CONTROL
        $datalg = DB::table("leakage_control as n");
        $datalg = $datalg->select("r.region_name as region_name", DB::raw('SUM(n.number_of_leakage)leakage'),DB::raw('SUM(n.number_of_fixed)fixed'));
        $datalg = $datalg->join("regions as r","r.id","=","n.region_id");
        $datalg = $datalg->where("n.deleted_at",'=',null); 
        $datalg = $datalg->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datalg = $datalg->where(DB::raw('MONTH(n.created_at)'),'=',date('m'));

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datalg = $datalg->where("r.id",'=',Auth::user()->region_id); 
        }
        $datalg = $datalg->groupBy("r.region_name"); 
        $datalg = $datalg->get(); 

        //LEAKAGE CONTROL
        $dataccr = DB::table("customer_reports as n");
        $dataccr = $dataccr->select("r.region_name as region_name", DB::raw('SUM(n.issues_call_center)center'),DB::raw('SUM(n.issues_regions)regions'),DB::raw('SUM(n.resolved)resolved'));
        $dataccr = $dataccr->join("regions as r","r.id","=","n.region_id");
        $dataccr = $dataccr->where("n.deleted_at",'=',null); 
        $dataccr = $dataccr->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $dataccr = $dataccr->where(DB::raw('MONTH(n.created_at)'),'=',date('m'));

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $dataccr = $dataccr->where("r.id",'=',Auth::user()->region_id); 
        }
        $dataccr = $dataccr->groupBy("r.region_name"); 
        $dataccr = $dataccr->get(); 

        //WASTE WATER
        $dataww = DB::table("wastewater as n");
        $dataww = $dataww->select("r.region_name as region_name","win.name as indicator_name",DB::raw('SUM(w.target)total_target'), DB::raw('SUM(n.achievements)total_achievement'),DB::raw('SUM(n.reported)total_reported'));
        $dataww = $dataww->join("wastewater_target as w","w.id","=","n.target");
        $dataww = $dataww->join("wastewater_indicators as win","win.id","=","n.indicator_id");
        $dataww = $dataww->join("regions as r","r.id","=","n.region_id");
        $dataww = $dataww->where("n.deleted_at",'=',null); 
        $dataww = $dataww->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $dataww = $dataww->where(DB::raw('MONTH(n.created_at)'),'=',date('m')); 

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin' ){
            $dataww = $dataww->where("r.id",'=',Auth::user()->region_id); 
        }
        $dataww = $dataww->groupBy("r.region_name","win.name","w.target"); 
        $dataww = $dataww->get(); 

        //WASTE WATER HOME PAGE

        $datahww = DB::table("wastewater as n");
        $datahww = $datahww->select("win.name as indicator_name",DB::raw('SUM(w.target)total_target'), DB::raw('SUM(n.achievements)total_achievement'),DB::raw('SUM(n.reported)total_reported'));
        $datahww = $datahww->join("wastewater_target as w","w.id","=","n.target");
        $datahww = $datahww->join("wastewater_indicators as win","win.id","=","n.indicator_id");
        $datahww = $datahww->join("regions as r","r.id","=","n.region_id");
        $datahww = $datahww->where("n.deleted_at",'=',null); 
        $datahww = $datahww->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datahww = $datahww->where(DB::raw('MONTH(n.created_at)'),'=',date('m')); 

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin' ){
            $datahww = $datahww->where("r.id",'=',Auth::user()->region_id); 
        }
        $datahww = $datahww->groupBy("win.name"); 
        $datahww = $datahww->get(); 

        /*print_r("<pre>");
        print_r($datahww);
        die();*/

        return view('system.dashboard.index',compact('datanc','datawc','datamr','datar','datarv','datawp','datalg','dataccr','dataww','datahww'));

    } 

    public function getDashboardIndexReport(Request $request){ 

        $data=$request->all();
        if($data['from'] !=null){
            $from=$data['from'];
            $start = date("Y-m-d",strtotime($from)); 
        }
        if($data['to'] !=null){
            $to=$data['to']; 
            $end = date("Y-m-d",strtotime($to));
        } 

        $query =  DB::table('roles');
        $query =  $query->select('roles.name');
        $query =  $query->join('role_user','role_user.role_id','=','roles.id');
        $query =  $query->join('users','users.id','=','role_user.user_id');
        $query =  $query->where('users.id','=',Auth::user()->id);
        $result = $query->first();

        //NEW CONNECTION
        $datanc = DB::table("new_connections as n");
        $datanc = $datanc->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'),"n.applied");
        $datanc = $datanc->join("watersales_target as w","w.id","=","n.target");
        $datanc = $datanc->join("regions as r","r.id","=","n.region_id");
        $datanc = $datanc->where("w.indicator_id",'=',NEW_CONNECTION);
        $datanc = $datanc->where("n.deleted_at",'=',null);
        $datanc =$datanc->whereBetween('n.created_at',[$start,$end]); 

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datanc = $datanc->where("r.id",'=',Auth::user()->region_id); 
        }
        $datanc = $datanc->groupBy("w.target","r.region_name","n.applied"); 
        $datanc = $datanc->get();

         //WATER SALES
        $datawc = DB::table("water_sales as n");
        $datawc = $datawc->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datawc = $datawc->join("watersales_target as w","w.id","=","n.target");
        $datawc = $datawc->join("regions as r","r.id","=","n.region_id");
        $datawc = $datawc->where("w.indicator_id",'=',WATER_SALES); 
        $datawc = $datawc->where("n.deleted_at",'=',null);
        $datawc =$datawc->whereBetween('n.created_at',[$start,$end]); 

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datawc = $datawc->where("r.id",'=',Auth::user()->region_id); 
        }
        $datawc = $datawc->groupBy("w.target","r.region_name"); 
        $datawc = $datawc->get();

         //METER READINGS
        $datamr = DB::table("meter_readings as n");
        $datamr = $datamr->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datamr = $datamr->join("watersales_target as w","w.id","=","n.target");
        $datamr = $datamr->join("regions as r","r.id","=","n.region_id");
        $datamr = $datamr->where("w.indicator_id",'=',METER_READINGS);
        $datamr = $datamr->where("n.deleted_at",'=',null);
        $datamr =$datamr->whereBetween('n.created_at',[$start,$end]);

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datamr = $datamr->where("r.id",'=',Auth::user()->region_id); 
        } 
        $datamr = $datamr->groupBy("w.target","r.region_name"); 
        $datamr = $datamr->get();

         //METER REPLACEMENTS
        $datar = DB::table("meter_replacements as n");
        $datar = $datar->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datar = $datar->join("watersales_target as w","w.id","=","n.target");
        $datar = $datar->join("regions as r","r.id","=","n.region_id");
        $datar = $datar->where("w.indicator_id",'=',METER_REPLACEMENT);
        $datar = $datar->where("n.deleted_at",'=',null); 
        $datar =$datar->whereBetween('n.created_at',[$start,$end]);

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datar = $datar->where("r.id",'=',Auth::user()->region_id); 
        }
        $datar = $datar->groupBy("w.target","r.region_name"); 
        $datar = $datar->get();

         //METER REVENUE COLLECTION
        $datarv = DB::table("revenue_collections as n");
        $datarv = $datarv->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datarv = $datarv->join("watersales_target as w","w.id","=","n.target");
        $datarv = $datarv->join("regions as r","r.id","=","n.region_id");
        $datarv = $datarv->where("w.indicator_id",'=',REVENUE_CONNECTION);
        $datarv = $datarv->where("n.deleted_at",'=',null); 
        $datarv =$datarv->whereBetween('n.created_at',[$start,$end]);

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datarv = $datarv->where("r.id",'=',Auth::user()->region_id); 
        }
        $datarv = $datarv->groupBy("w.target","r.region_name"); 
        $datarv = $datarv->get();  

        //WATER PRODUCTIONS
        $datawp = DB::table("water_productions as n");
        $datawp = $datawp->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datawp = $datawp->join("watersales_target as w","w.id","=","n.target");
        $datawp = $datawp->join("regions as r","r.id","=","n.region_id");
        $datawp = $datawp->where("w.indicator_id",'=',WATER_PRODUCTION);
        $datawp = $datawp->where("n.deleted_at",'=',null); 
        $datawp = $datawp->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datawp = $datawp->where(DB::raw('MONTH(n.created_at)'),'=',date('m'));

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datawp = $datawp->where("r.id",'=',Auth::user()->region_id); 
        }
        $datawp = $datawp->groupBy("w.target","r.region_name"); 
        $datawp = $datawp->get(); 

        //LEAKAGE CONTROL
        $datalg = DB::table("leakage_control as n");
        $datalg = $datalg->select("r.region_name as region_name", DB::raw('SUM(n.number_of_leakage)leakage'),DB::raw('SUM(n.number_of_fixed)fixed'));
        $datalg = $datalg->join("regions as r","r.id","=","n.region_id");
        $datawp = $datalg->where("n.deleted_at",'=',null); 
        $datalg = $datalg->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datalg = $datalg->where(DB::raw('MONTH(n.created_at)'),'=',date('m'));

       if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datalg = $datalg->where("r.id",'=',Auth::user()->region_id); 
        }
        $datalg = $datalg->groupBy("r.region_name"); 
        $datalg = $datalg->get();

        $region_name=Region::pluck('region_name','id')->all();
        $indicator_name=Indicator::pluck('name','id')->all(); 
        return view('system.dashboard.reportform',compact('datanc','datawc','datamr','datar','datarv','datawp','datalg','region_name','indicator_name'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDashboardGraphForm(){

        $region_name=Region::pluck('region_name','id')->all();
        $indicator_name=Indicator::where('id','!=',4)->pluck('name','id')->all();
        
        $query =  DB::table('roles');
        $query =  $query->select('roles.name');
        $query =  $query->join('role_user','role_user.role_id','=','roles.id');
        $query =  $query->join('users','users.id','=','role_user.user_id');
        $query =  $query->where('users.id','=',Auth::user()->id);
        $result = $query->first();

        //NEW CONNECTION
        $datanc = DB::table("new_connections as n");
        $datanc = $datanc->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'),"n.applied");
        $datanc = $datanc->join("watersales_target as w","w.id","=","n.target");
        $datanc = $datanc->join("regions as r","r.id","=","n.region_id");
        $datanc = $datanc->where("w.indicator_id",'=',NEW_CONNECTION); 
        $datanc = $datanc->where("n.deleted_at",'=',null); 
        $datanc = $datanc->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datanc = $datanc->where(DB::raw('MONTH(n.created_at)'),'=',date('m')); 

       if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datanc = $datanc->where("r.id",'=',Auth::user()->region_id); 
        }
        $datanc = $datanc->groupBy("w.target","r.region_name","n.applied"); 
        $datanc = $datanc->get();

         //WATER SALES
        $datawc = DB::table("water_sales as n");
        $datawc = $datawc->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datawc = $datawc->join("watersales_target as w","w.id","=","n.target");
        $datawc = $datawc->join("regions as r","r.id","=","n.region_id");
        $datawc = $datawc->where("w.indicator_id",'=',WATER_SALES);
        $datawc = $datawc->where("n.deleted_at",'=',null); 
        $datawc = $datawc->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datawc = $datawc->where(DB::raw('MONTH(n.created_at)'),'=',date('m')); 

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datawc = $datawc->where("r.id",'=',Auth::user()->region_id); 
        }
        $datawc = $datawc->groupBy("w.target","r.region_name"); 
        $datawc = $datawc->get();

         //METER READINGS
        $datamr = DB::table("meter_readings as n");
        $datamr = $datamr->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datamr = $datamr->join("watersales_target as w","w.id","=","n.target");
        $datamr = $datamr->join("regions as r","r.id","=","n.region_id");
        $datamr = $datamr->where("w.indicator_id",'=',METER_READINGS);
        $datamr = $datamr->where("n.deleted_at",'=',null);
        $datamr = $datamr->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datamr = $datamr->where(DB::raw('MONTH(n.created_at)'),'=',date('m'));

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datamr = $datamr->where("r.id",'=',Auth::user()->region_id); 
        } 
        $datamr = $datamr->groupBy("w.target","r.region_name"); 
        $datamr = $datamr->get();

         //METER REPLACEMENTS
        $datar = DB::table("meter_replacements as n");
        $datar = $datar->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datar = $datar->join("watersales_target as w","w.id","=","n.target");
        $datar = $datar->join("regions as r","r.id","=","n.region_id");
        $datar = $datar->where("w.indicator_id",'=',METER_REPLACEMENT); 
        $datar = $datar->where("n.deleted_at",'=',null); 
        $datar = $datar->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datar = $datar->where(DB::raw('MONTH(n.created_at)'),'=',date('m'));

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datar = $datar->where("r.id",'=',Auth::user()->region_id); 
        }
        $datar = $datar->groupBy("w.target","r.region_name"); 
        $datar = $datar->get();

         //METER REVENUE COLLECTION
        $datarv = DB::table("revenue_collections as n"); 
        $datarv = $datarv->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'),DB::raw('SUM(n.other_payments)total_other_payments'));
        $datarv = $datarv->join("watersales_target as w","w.id","=","n.target");
        $datarv = $datarv->join("regions as r","r.id","=","n.region_id");
        $datarv = $datarv->where("w.indicator_id",'=',REVENUE_CONNECTION);
        $datarv = $datarv->where("n.deleted_at",'=',null); 
        $datarv = $datarv->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datarv = $datarv->where(DB::raw('MONTH(n.created_at)'),'=',date('m'));

       if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datarv = $datarv->where("r.id",'=',Auth::user()->region_id); 
        }
        $datarv = $datarv->groupBy("w.target","r.region_name"); 
        $datarv = $datarv->get(); 

        //WATER PRODUCTIONS
        $datawp = DB::table("water_productions as n");
        $datawp = $datawp->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datawp = $datawp->join("watersales_target as w","w.id","=","n.target");
        $datawp = $datawp->join("regions as r","r.id","=","n.region_id");
        $datawp = $datawp->where("w.indicator_id",'=',WATER_PRODUCTION);
        $datawp = $datawp->where("n.deleted_at",'=',null); 
        $datawp = $datawp->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datawp = $datawp->where(DB::raw('MONTH(n.created_at)'),'=',date('m'));

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datawp = $datawp->where("r.id",'=',Auth::user()->region_id); 
        }
        $datawp = $datawp->groupBy("w.target","r.region_name"); 
        $datawp = $datawp->get(); 

        //LEAKAGE CONTROL
        $datalg = DB::table("leakage_control as n");
        $datalg = $datalg->select("r.region_name as region_name", DB::raw('SUM(n.number_of_leakage)leakage'),DB::raw('SUM(n.number_of_fixed)fixed'));
        $datalg = $datalg->join("regions as r","r.id","=","n.region_id");
        $datawp = $datalg->where("n.deleted_at",'=',null); 
        $datalg = $datalg->where(DB::raw('YEAR(n.created_at)'),'=',date('Y')); 
        $datalg = $datalg->where(DB::raw('MONTH(n.created_at)'),'=',date('m'));

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datalg = $datalg->where("r.id",'=',Auth::user()->region_id); 
        }
        $datalg = $datalg->groupBy("r.region_name"); 
        $datalg = $datalg->get();
        return view('system.dashboard.graphs',compact('region_name','indicator_name','datanc','datawc','datawp','datalg','datamr','datar','datarv'));
    }
    public function getDashboardForm()
    {

        $region_name=Region::pluck('region_name','id')->all();
        $indicator_name=Indicator::where('id','!=',4)->pluck('name','id')->all();
        $datanc=[];
        $datawc=[];
        $datamr=[];
        $datar=[];
        $datarv=[];
        $datawp=[];
        $datalg=[];

        return view('system.dashboard.reportform',compact('region_name','indicator_name','datanc','datawc','datamr','datar','datarv','datawp','datalg'));
    }
    

    public function getDashboardReports(Request $request){

        $query =  DB::table('roles');
        $query =  $query->select('roles.name');
        $query =  $query->join('role_user','role_user.role_id','=','roles.id');
        $query =  $query->join('users','users.id','=','role_user.user_id');
        $query =  $query->where('users.id','=',Auth::user()->id);
        $result = $query->first();

        $data = $request->all();

        $region_id=$data['region_id'];
        $indicator_id=$data['indicator_id'];

        if($data['from'] !=null){
            $from=$data['from'];
            $start = date("Y-m-d",strtotime($from)); 
        }
        if($data['to'] !=null){
            $to=$data['to']; 
            $end = date("Y-m-d",strtotime($to));
        }

         //NEW CONNECTION
        if(is_numeric($indicator_id) && $indicator_id==NEW_CONNECTION){
            $datanc = DB::table("new_connections as n");
        }
        if(is_numeric($indicator_id) && $indicator_id==WATER_SALES){
            $datanc = DB::table("water_sales as n");
        }
        if(is_numeric($indicator_id) && $indicator_id==METER_READINGS){
            $datanc = DB::table("meter_readings as n");
        }
        if(is_numeric($indicator_id) && $indicator_id==METER_REPLACEMENT){
            $datanc = DB::table("meter_replacements as n");
        }
        if(is_numeric($indicator_id) && $indicator_id==REVENUE_CONNECTION){
            $datanc = DB::table("revenue_collections as n");
        }
        $datanc = $datanc->select("r.region_name as region_name","w.target as total_target", DB::raw('SUM(n.achievement)total_achievement'));
        $datanc = $datanc->join("watersales_target as w","w.id","=","n.target");
        $datanc = $datanc->join("regions as r","r.id","=","n.region_id"); 
        $datanc = $datanc->where("n.deleted_at",'=',null);
        if(is_numeric($region_id)){
         $datanc = $datanc->where("r.id",'=',$region_id); 
     }
     if(is_numeric($indicator_id)){
         $datanc = $datanc->where("w.indicator_id",'=',$indicator_id); 
     }

     if($data['from'] !=null && $data['to'] !=null){

         $datanc =$datanc->whereBetween('n.created_at',[$start,$end]);
     }

        if($result->name !="super_admin" && $result->name !='general_dashboard_viewer' && $result->name !='admin'){
            $datanc = $datanc->where("r.id",'=',Auth::user()->region_id); 
        }
        $datanc = $datanc->groupBy("w.target","r.region_name"); 
        $datanc = $datanc->get();

        

        $region_name=Region::pluck('region_name','id')->all();
        $indicator_name=Indicator::pluck('name','id')->all();

        $datawc=[];
        $datamr=[];
        $datar=[];
        $datarv=[];
        $datawp=[];
        $datalg=[];



        return view("system.dashboard.reportform", compact('datanc','region_name','indicator_name','datawc','datamr','datar','datarv','datawp','datalg'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }

}
