<?php
namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\CustomerCare;

use Response;
use Validator;
use Redirect;
use Auth; 
use Crypt;
use Datatables;
use DB;
class CustomerCareController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function indexold(Request $request) {
		$data = CustomerCare::orderBy('id', 'DESC') -> paginate(10);
		return view('system.customer_care.index', compact('data')) -> with('i', ($request -> input('page', 1) - 1) * 10);
	}


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

			$query=CustomerCare::with('region')->select('customer_reports.*',DB::raw('@rownum := @rownum + 1 AS rownum'))
			->where(DB::raw('YEAR(created_at)'),'=',date('Y'))
			->where(DB::raw('MONTH(created_at)'),'=',date('m'));
			
			if($result->name !="super_admin" && $result->name !='admin'){
				$query->where('region_id','=',Auth::user()->region_id);
			}

			return Datatables::of($query)
			
			->addColumn('region_name', function ($data) {

				return $data->region->region_name;

			})

			->addColumn('total', function ($data) {
				return $data->issues_call_center + $data->issues_regions;
			})

			->addColumn('pending', function ($data) {
				return ($data->issues_call_center + $data->issues_regions) - $data->resolved ;
			})


			
			->addColumn('options', function ($data) {
				
				$str='';
				if(Auth::user()->can(['customer_care.edit'])){
				$str.='<a class="left" href="'.route('customer_care.edit',Crypt::encrypt($data->id)).'" title="Edit"><i class="fa fa-pencil left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				if(Auth::user()->can(['customer_care.delete_customer_care'])){
				$str.='<a class="left delete-data"  onclick="'."return confirm('Are you sure,you want to perform this Action?')".' "      href="'.route('customer_care.delete_customer_care',$data->id).'" title="Delete"><i class="fa fa-trash-o left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				return $str;

			})

			->make(true);
		} 
		return view('system.customer_care.index',compact('data'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('system.customer_care.create');
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
		$validator = Validator::make($data = $request -> all(), CustomerCare::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}
		$data['user_id'] = Auth::user()->id;
		$data['region_id'] = Auth::user()->region_id;

		/*print_r("<pre>");
		print_r($data);
		die();*/
		$customer_care = CustomerCare::create($data);

		if ($customer_care) {
			return redirect() -> route('customer_care.index') -> with('message', 'Data has Created successfully') -> with('status', 'success');
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
		$customer_care = CustomerCare::find($id);

		return view("system.customer_care.edit", compact('customer_care'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$validator = Validator::make($data = $request -> all(),CustomerCare::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}

		$customer_care = CustomerCare::find($id);
		//$data['user_id'] = Auth::user()->id;

		if ($customer_care -> update($data)) {
			return redirect() -> route('customer_care.index') -> with('message', 'Data has been  Updated successfully') -> with('status', 'success');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$customer_care = CustomerCare::find($id);
		
		
		$customer_care -> destroy($id);

		return redirect() -> route('customer_care.index') -> with('message', 'Data has been deleted successfully') -> with('status', 'success');
		

	}

}
