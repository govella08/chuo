<?php
namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\WatersalesTargets;
use Illuminate\Http\Request;
use App\Models\Watersales;

use Response;
use Validator;
use Redirect;
use Auth; 
use Crypt;
use Datatables;
use DB;
class WatersalesController extends Controller {

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

			$query=Watersales::with('region')->select('water_sales.*',DB::raw('@rownum := @rownum + 1 AS rownum')) 
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
				 if(Auth::user()->can(['water_sales.edit'])){
				$str.='<a class="left" href="'.route('water_sales.edit',Crypt::encrypt($data->id)).'" title="Edit"><i class="fa fa-pencil left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				 if(Auth::user()->can(['water_sales.delete_water_sales'])){
				$str.='<a class="left delete-data"    onclick="'."return confirm('Are you sure,you want to perform this Action?')".' "    href="'.route('water_sales.delete_water_sales',$data->id).'" title="Delete"><i class="fa fa-trash-o left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				return $str;

			})

			->make(true);
		} 
		return view('system.water_sales.index',compact('data'));

	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	/*	return view('system.water_sales.create');
	}
*/
	public function create() {
		$target_id=null;

		if(strpos($_SERVER['REQUEST_URI'],'water_sales')){ $target_id=WATER_SALES; }

		
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
		
		return view('system.water_sales.create',compact('target_date'));
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
		$validator = Validator::make($data = $request -> all(), Watersales::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}
		$data['user_id'] = Auth::user()->id;
		$data['region_id'] = Auth::user()->region_id;

		$target_id=null;

		if(strpos($_SERVER['REQUEST_URI'],'water_sales')){ $target_id=WATER_SALES; }

		
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
		

		/*print_r("<pre>");
		print_r($data);
		die();*/
		$water_sales = Watersales::create($data);

		if ($water_sales) {
			return redirect() -> route('water_sales.index') -> with('message', 'Data has Created successfully') -> with('status', 'success');
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
		$water_sales = Watersales::find($id);

		return view("system.water_sales.edit", compact('water_sales'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$validator = Validator::make($data = $request -> all(),Watersales::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}

		$water_sales = Watersales::find($id);
		//$data['user_id'] = Auth::user()->id;

		if ($water_sales -> update($data)) {
			return redirect() -> route('water_sales.index') -> with('message', 'Data has been Updated successfully') -> with('status', 'success');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$water_sales = Watersales::find($id);
		
		
		$water_sales -> destroy($id);

		return redirect() -> route('water_sales.index') -> with('message', 'Data has been deleted successfully') -> with('status', 'success');
		

	}

}
