<?php
namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WatersalesTargets;
use App\Models\Region;
use App\Models\Indicator;

use Response;
use Validator;
use Redirect;
use Auth; 
use Crypt;
use Datatables;
use DB;
class WatersalesTargetsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index(Request $request)

	{


		if($request->ajax()){

			$data=DB::statement(DB::raw('set @rownum=0'));

			return Datatables::of(WatersalesTargets::with('region','indicator')->select('watersales_target.*',DB::raw('@rownum := @rownum + 1 AS rownum')))
			->where(DB::raw('YEAR(created_at)'),'=',date('Y'))
			->where(DB::raw('MONTH(created_at)'),'=',date('m'))

			->addColumn('region_name', function ($data) {

				return $data->region->region_name;

			}) 

			->addColumn('indicator_name', function ($data) {

				return $data->indicator->name;

			})


			->addColumn('options', function ($data) {
				$str='';
				 if(Auth::user()->can(['watersales_targets.edit'])){
				$str.='<a class="left" href="'.route('watersales_targets.edit',Crypt::encrypt($data->id)).'" title="Edit"><i class="fa fa-pencil left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				 if(Auth::user()->can(['watersales_targets.delete_watersales_targets'])){
				$str.='<a class="left delete-data"    onclick="'."return confirm('Are you sure,you want to perform this Action?')".' "    href="'.route('watersales_targets.delete_watersales_targets',$data->id).'" title="Delete"><i class="fa fa-trash-o left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				return $str;

			})

			->make(true);
		} 
		return view('system.watersales_targets.index',compact('data'));

	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$region_name=Region::pluck('region_name','id')->all();
		$indicator_name=Indicator::pluck('name','id')->all();

		return view('system.watersales_targets.create',compact('region_name','indicator_name'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

	/*	echo (date('Y-m'));
	die();*/

		/*echo(Auth::user()->id);
		die();*/
		$validator = Validator::make($data = $request -> all(), WatersalesTargets::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}
		$data['user_id'] = Auth::user()->id;
		//$data['region_id'] = Auth::user()->region_id;


		//check if target exists
		$todaydate=date('Y-m');

		$check=WatersalesTargets::where('region_id',$data['region_id'])->where('indicator_id',$data['indicator_id'])
		->where(DB::raw('YEAR(created_at)'),'=',date('Y'))
		->where(DB::raw('MONTH(created_at)'),'=',date('m'))->first();

		if( count($check)){

			$target_date= date('Y-m',strtotime($check->created_at));

			if($todaydate ==  $target_date){
				return Redirect::back() -> withInput()->with('message', 'Duplicate Entry for this Month')-> with('status', 'danger');;
			}

		}

		if($data['target'] == 0){
			return Redirect::back() -> withInput()->with('message', 'Please set Target for this Month')-> with('status', 'danger');;
			}
			
		$watersales_targets = WatersalesTargets::create($data);
		if ($watersales_targets) {
			return redirect() -> route('watersales_targets.index') -> with('message', 'Data has been Created successfully') -> with('status', 'success');
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
		$watersales_targets = WatersalesTargets::find($id);



		$region_name=Region::pluck('region_name','id')->all();
		$indicator_name=Indicator::pluck('name','id')->all();

		return view("system.watersales_targets.edit", compact('watersales_targets','region_name','indicator_name'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$validator = Validator::make($data = $request -> all(),WatersalesTargets::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}

		$watersales_targets = WatersalesTargets::find($id);
		//$data['user_id'] = Auth::user()->id;

		if ($watersales_targets -> update($data)) {
			return redirect() -> route('watersales_targets.index') -> with('message', 'Data has Updated successfully') -> with('status', 'success');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$ws = WatersalesTargets::find($id);

         if (($ws->customers->count() > 0) || ($ws->leakages->count() > 0) || ($ws->meterreadings->count() > 0) || ($ws->meterreplacements->count() > 0)
            || ($ws->newconnections->count() > 0) || ($ws->revenuecollections->count() > 0) || ($ws->watertargets->count() > 0) || ($ws->wastewatertargets->count() > 0) || ($ws->watersales->count() > 0) || ($ws->waterproductions->count() > 0)) {
            return redirect()->route('watersales_targets.index')
            ->with('message', 'You can not Delete,Some Data are still referenced to this Target')
            ->with('status', 'danger');
         }
         else{
            
             $ws->destroy($id);
            return redirect()->route('watersales_targets.index')
            ->with('message', 'Watersales Target Deleted Successfully')
            ->with('status', 'success');
         }

	}

}
