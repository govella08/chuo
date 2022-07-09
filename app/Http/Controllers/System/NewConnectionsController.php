<?php
namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewConnection;
use App\Models\WatersalesTargets;

use Response;
use Validator;
use Redirect;
use Auth; 
use Crypt;
use Datatables;
use DB;
class NewConnectionsController extends Controller {

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
			

			$query=NewConnection::with('region','target')->select('new_connections.*',DB::raw('@rownum := @rownum + 1 AS rownum')) 
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
				if(Auth::user()->can(['newconnections.edit'])){
				$str.='<a class="left" href="'.route('newconnections.edit',Crypt::encrypt($data->id)).'" title="Edit"><i class="fa fa-pencil left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				if(Auth::user()->can(['newconnections.delete_newconnections'])){
				$str.='<a class="left delete-data"    onclick="'."return confirm('Are you sure,you want to perform this Action?')".' "    href="'.route('newconnections.delete_newconnections',$data->id).'" title="Delete"><i class="fa fa-trash-o left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				return $str;

			})

			->make(true);
		} 

        /*$target_id=null;

        if(strpos($_SERVER['REQUEST_URI'],'newconnections')){ $target_id=2; }

        
        $todaydate=date('Y-m');

         $target=WatersalesTargets::where('region_id',Auth::user()->region_id)->where('indicator_id', $target_id)->first();
        	
        	if( count($target)){

         $target_date= date('Y-m',strtotime($target->created_at));

         if($todaydate ==  $target_date){
         	$target_date=$target->target;
         }

         return view('system.newconnections.index',compact('data','target_date'));
     }*/
     return view('system.newconnections.index',compact('data'));

 }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$target_id=null;

		if(strpos($_SERVER['REQUEST_URI'],'newconnections')){ $target_id=NEW_CONNECTION; }

		
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

		
		return view('system.newconnections.create',compact('target_date'));
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
		$validator = Validator::make($data = $request -> all(), NewConnection::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}
		$data['user_id'] = Auth::user()->id;
		$data['region_id'] = Auth::user()->region_id;
		

		$target_id=null;

		if(strpos($_SERVER['REQUEST_URI'],'newconnections')){ $target_id=NEW_CONNECTION; }

		
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

		$NewConnection = NewConnection::create($data);

		if ($NewConnection) {
			return redirect() -> route('newconnections.index') -> with('message', 'Data has Created successfully') -> with('status', 'success');
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
		$newconnection = NewConnection::find($id);

		return view("system.newconnections.edit", compact('newconnection'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$validator = Validator::make($data = $request -> all(), NewConnection::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}

		$NewConnection = NewConnection::find($id);
		//$data['user_id'] = Auth::user()->id;

		if ($NewConnection -> update($data)) {
			return redirect() -> route('newconnections.index') -> with('message', 'Data Updated successfully') -> with('status', 'success');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$NewConnection = NewConnection::find($id);
		
		
		$NewConnection -> destroy($id);

		return redirect() -> route('newconnections.index') -> with('message', 'Data has been deleted successfully') -> with('status', 'success');
		

	}

}
