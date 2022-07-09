<?php
namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WasteWater;
use App\Models\WastewaterTargets;
use App\Models\WasteWaterIndicator;

use Response;
use Validator;
use Redirect;
use Auth; 
use Crypt;
use Datatables;
use DB;
class WasteWaterController extends Controller {

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
			

			$query=WasteWater::with('region','target')->select('wastewater.*',DB::raw('@rownum := @rownum + 1 AS rownum')) 
			->where(DB::raw('YEAR(created_at)'),'=',date('Y'))
			->where(DB::raw('MONTH(created_at)'),'=',date('m'));
			
			if($result->name !="super_admin" && $result->name !='admin'){
				$query->where('region_id','=',Auth::user()->region_id);
			}

			return Datatables::of($query)
			
			->addColumn('region_name', function ($data) {

				return $data->region->region_name;

			}) 
			
			->addColumn('indicator_name', function ($data) {
				return $data->indicator->name;

			}) 


			
			->addColumn('options', function ($data) {
				
				$str='';
				if(Auth::user()->can(['wastewater.edit'])){
				$str.='<a class="left" href="'.route('wastewater.edit',Crypt::encrypt($data->id)).'" title="Edit"><i class="fa fa-pencil left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				if(Auth::user()->can(['wastewater.delete_wastewater'])){
				$str.='<a class="left delete-data"    onclick="'."return confirm('Are you sure,you want to perform this Action?')".' "    href="'.route('wastewater.delete_wastewater',$data->id).'" title="Delete"><i class="fa fa-trash-o left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				return $str;

			})

			->make(true);
		} 

     return view('system.wastewater.index',compact('data'));

 }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$wastewater=WasteWaterIndicator::pluck('name','id')->toArray();


		
		return view('system.wastewater.create',compact('target_date','wastewater'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) { 

		$validator = Validator::make($data = $request -> all(), WasteWater::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}
		$data['user_id'] = Auth::user()->id;
		$data['region_id'] = Auth::user()->region_id;
		$indicator_id=$data['indicator_id'];

		
		$todaydate=date('Y-m');

		$target=WastewaterTargets::where('region_id',Auth::user()->region_id)->where('indicator_id', $indicator_id)
		->where(DB::raw('YEAR(created_at)'),'=',date('Y'))
		->where(DB::raw('MONTH(created_at)'),'=',date('m'))->first();
		
		if( count($target)){

			$target_date= date('Y-m',strtotime($target->created_at));

			if($todaydate ==  $target_date){
				$data['target'] =$target->id;
			}

		$wastewater = WasteWater::create($data);
		}
		else{
			return Redirect::back() -> withInput()->with('message', 'Contact Administrator to set Target') -> with('status', 'danger');;
		}


		if ($wastewater) {
			return redirect() -> route('wastewater.index') -> with('message', 'Data has Created successfully') -> with('status', 'success');
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
		$wastewateredit = WasteWater::find($id);
		$wastewater=WasteWaterIndicator::pluck('name','id')->toArray();

		return view("system.wastewater.edit", compact('wastewater','wastewateredit'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$validator = Validator::make($data = $request -> all(), WasteWater::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}

		$wastewater = WasteWater::find($id);
		//$data['user_id'] = Auth::user()->id;

		if ($wastewater -> update($data)) {
			return redirect() -> route('wastewater.index') -> with('message', 'Data Updated successfully') -> with('status', 'success');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$wastewater = WasteWater::find($id);
		
		
		$wastewater -> destroy($id);

		return redirect() -> route('wastewater.index') -> with('message', 'Data has been deleted successfully') -> with('status', 'success');
		

	}

}
