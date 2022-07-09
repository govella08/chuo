<?php
namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\LeakageControl;

use Response;
use Validator;
use Redirect;
use Auth; 
use Crypt;
use Datatables;
use DB;
class LeakageController extends Controller {

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
			$query=LeakageControl::with('region')->select('leakage_control.*',DB::raw('@rownum := @rownum + 1 AS rownum'))
			->where(DB::raw('YEAR(created_at)'),'=',date('Y'))
			->where(DB::raw('MONTH(created_at)'),'=',date('m'));
			
				if($result->name !="super_admin" && $result->name !='admin'){
				$query->where('region_id','=',Auth::user()->region_id);
			}

			return Datatables::of($query)

			->addColumn('region_name', function ($data) {

				return $data->region->region_name;

			})
			->addColumn('pending', function ($data) {

				if($data->number_of_leakage > $data->number_of_fixed){

					return  $data->number_of_leakage - $data->number_of_fixed ;
				} else{ return "0"; }

			}) 



			->addColumn('options', function ($data) {

				$str='';
				if(Auth::user()->can(['leakage_control.edit'])){
				$str.='<a class="left" href="'.route('leakage_control.edit',Crypt::encrypt($data->id)).'" title="Edit"><i class="fa fa-pencil left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				if(Auth::user()->can(['leakage_control.delete_leakage_control'])){
				$str.='<a class="left delete-data"   onclick="'."return confirm('Are you sure,you want to perform this Action?')".' "  href="'.route('leakage_control.delete_leakage_control',$data->id).'" title="Delete"><i class="fa fa-trash-o left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				return $str;

			})

			->make(true);
		} 
		return view('system.leakage_control.index',compact('data'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('system.leakage_control.create');
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
		$validator = Validator::make($data = $request -> all(), LeakageControl::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}
		$data['user_id'] = Auth::user()->id;
		$data['region_id'] = Auth::user()->region_id;

		/*print_r("<pre>");
		print_r($data);
		die();*/
		$leakage_control = LeakageControl::create($data);

		if ($leakage_control) {
			return redirect() -> route('leakage_control.index') -> with('message', 'Data has Created successfully') -> with('status', 'success');
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
		$leakage_control = LeakageControl::find($id);

		return view("system.leakage_control.edit", compact('leakage_control'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$validator = Validator::make($data = $request -> all(),LeakageControl::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}

		$leakage_control = LeakageControl::find($id);
		//$data['user_id'] = Auth::user()->id;

		if ($leakage_control -> update($data)) {
			return redirect() -> route('leakage_control.index') -> with('message', 'Data has Updated successfully') -> with('status', 'success');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$leakage_control = LeakageControl::find($id);


		$leakage_control -> destroy($id);

		return redirect() -> route('leakage_control.index') -> with('message', 'Data has been deleted successfully') -> with('status', 'success');
		

	}

}
