<?php
namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\WatersalesTargets;
use Illuminate\Http\Request;
use App\Models\MeterReplacement;

use Response;
use Validator;
use Redirect;
use Auth; 
use Crypt;
use Datatables;
use DB;
class MeterReplacementController extends Controller {

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



		if($request->ajax()){

			
			$data=DB::statement(DB::raw('set @rownum=0'));
			$query=MeterReplacement::with('region','target')->select('meter_replacements.*',DB::raw('@rownum := @rownum + 1 AS rownum'))
			->where(DB::raw('YEAR(created_at)'),'=',date('Y'))
			->where(DB::raw('MONTH(created_at)'),'=',date('m'));
			
			if($result->name !="super_admin" && $result->name !='admin'){
				$query->where('region_id','=',Auth::user()->region_id);
			} 

			return Datatables::of($query)
			
			->addColumn('region_name', function ($data) {

				return $data->region->region_name;

			}) 



			->addColumn('options', function ($data) {

				$str='';
				if(Auth::user()->can(['meter_replacement.edit'])){
				$str.='<a class="left" href="'.route('meter_replacement.edit',Crypt::encrypt($data->id)).'" title="Edit"><i class="fa fa-pencil left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				if(Auth::user()->can(['meter_replacement.delete_meter_replacement'])){
				$str.='<a class="left delete-data"php   onclick="'."return confirm('Are you sure,you want to perform this Action?')".' "   href="'.route('meter_replacement.delete_meter_replacement',$data->id).'" title="Delete"><i class="fa fa-trash-o left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				return $str;

			})

			->make(true);
		} 

		return view('system.meter_replacement.index',compact('data'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$target_id=null;

		if(strpos($_SERVER['REQUEST_URI'],'meter_replacement')){ $target_id=METER_REPLACEMENT; }

		
		$todaydate=date('Y-m');

		$target=WatersalesTargets::where('region_id',Auth::user()->region_id)->where('indicator_id', $target_id)
		->where(DB::raw('YEAR(created_at)'),'=',date('Y'))
		->where(DB::raw('MONTH(created_at)'),'=',date('m'))->first();
		
		$target_date=0;
		if($target !=null){
			if(count($target)){

				$target_date= date('Y-m',strtotime($target->created_at));

				if($todaydate ==  $target_date){
					$target_date=$target->target;
				}
				
			}
			else{
				$target_date=0;
			}
		}

		return view('system.meter_replacement.create',compact('target_date'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		/*var_dump($request->all());
		die();*/

		/*echo(Auth::user()->id);
		die();*/
		$validator = Validator::make($data = $request -> all(), MeterReplacement::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}
		$data['user_id'] = Auth::user()->id;
		$data['region_id'] = Auth::user()->region_id;

		/*print_r("<pre>");
		print_r($data);
		die();*/

		$target_id=null;

		if(strpos($_SERVER['REQUEST_URI'],'meter_replacement')){ $target_id=METER_REPLACEMENT; }

		
		$todaydate=date('Y-m');

		$target=WatersalesTargets::where('region_id',Auth::user()->region_id)->where('indicator_id', $target_id)
		->where(DB::raw('YEAR(created_at)'),'=',date('Y'))
		->where(DB::raw('MONTH(created_at)'),'=',date('m'))->first();
		
		if( count($target)){

			$target_date= date('Y-m',strtotime($target->created_at));

			if($todaydate ==  $target_date){
				$data['target'] =$target->id;
			}

		}

		$meter_replacement = MeterReplacement::create($data);

		if ($meter_replacement) {
			return redirect() -> route('meter_replacement.index') -> with('message', 'Data has Created successfully') -> with('status', 'success');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) { 
		$id=Crypt::decrypt($id);
		$meter_replacement = MeterReplacement::find($id);

		return view("system.meter_replacement.edit", compact('meter_replacement'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$validator = Validator::make($data = $request -> all(),MeterReplacement::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}

		$meter_replacement = MeterReplacement::find($id);
		//$data['user_id'] = Auth::user()->id;

		if ($meter_replacement -> update($data)) {
			return redirect() -> route('meter_replacement.index') -> with('message', 'Data has Updated successfully') -> with('status', 'success');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$meter_replacement = MeterReplacement::find($id);


		$meter_replacement -> destroy($id);

		return redirect() -> route('meter_replacement.index') -> with('message', 'Data has been deleted successfully') -> with('status', 'success');
		

	}

}
