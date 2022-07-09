<?php
namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\WatersalesTargets;
use Illuminate\Http\Request;
use App\Models\RevenueCollections;

use Response;
use Validator;
use Redirect;
use Auth; 
use Crypt;
use Datatables;
use DB;
class RevenueCollectionsController extends Controller {

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
			
			$query=RevenueCollections::with('region','target')->select('revenue_collections.*',DB::raw('@rownum := @rownum + 1 AS rownum')) 
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
				 if(Auth::user()->can(['revenue_collections.edit'])){
				$str.='<a class="left" href="'.route('revenue_collections.edit',Crypt::encrypt($data->id)).'" title="Edit"><i class="fa fa-pencil left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				 if(Auth::user()->can(['revenue_collections.delete_revenue_collections'])){
				$str.='<a class="left delete-data"    onclick="'."return confirm('Are you sure,you want to perform this Action?')".' "    href="'.route('revenue_collections.delete_revenue_collections',$data->id).'" title="Delete"><i class="fa fa-trash-o left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				return $str;

			})

			->make(true);
		} 
		return view('system.revenue_collections.index',compact('data'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$target_id=null;

		if(strpos($_SERVER['REQUEST_URI'],'revenue_collections')){ $target_id=REVENUE_CONNECTION; }

		
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

		return view('system.revenue_collections.create',compact('target_date'));
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
		$validator = Validator::make($data = $request -> all(), RevenueCollections::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}
		$data['user_id'] = Auth::user()->id;
		$data['region_id'] = Auth::user()->region_id;

		/*print_r("<pre>");
		print_r($data);
		die();*/
		$target_id=null;

		if(strpos($_SERVER['REQUEST_URI'],'revenue_collections')){ $target_id=REVENUE_CONNECTION; }

		
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

		$revenue_collections = RevenueCollections::create($data);

		if ($revenue_collections) {
			return redirect() -> route('revenue_collections.index') -> with('message', 'Data has Created successfully') -> with('status', 'success');
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
		$revenue_collections = RevenueCollections::find($id);

		return view("system.revenue_collections.edit", compact('revenue_collections'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$validator = Validator::make($data = $request -> all(),RevenueCollections::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}

		$revenue_collections = RevenueCollections::find($id);
		//$data['user_id'] = Auth::user()->id;

		if ($revenue_collections -> update($data)) {
			return redirect() -> route('revenue_collections.index') -> with('message', 'Data has Updated successfully') -> with('status', 'success');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$revenue_collections = RevenueCollections::find($id);
		
		
		$revenue_collections -> destroy($id);

		return redirect() -> route('revenue_collections.index') -> with('message', 'Data has been deleted successfully') -> with('status', 'success');
		

	}

}
