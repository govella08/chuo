<?php
namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WastewaterTargets;
use App\Models\Region;
use App\Models\WasteWaterIndicator;

use Response;
use Validator;
use Redirect;
use Auth; 
use Crypt;
use Datatables;
use DB;
class WasteWaterTargetsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index(Request $request)

	{


		if($request->ajax()){

			$data=DB::statement(DB::raw('set @rownum=0'));

			return Datatables::of(WastewaterTargets::with('region','indicator')->select('wastewater_target.*',DB::raw('@rownum := @rownum + 1 AS rownum')))
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
				 if(Auth::user()->can(['wastewater_targets.edit'])){
				$str.='<a class="left" href="'.route('wastewater_targets.edit',Crypt::encrypt($data->id)).'" title="Edit"><i class="fa fa-pencil left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				 if(Auth::user()->can(['wastewater_targets.delete_wastewater_targets'])){
				$str.='<a class="left delete-data"    onclick="'."return confirm('Are you sure,you want to perform this Action?')".' "    href="'.route('wastewater_targets.delete_wastewater_targets',$data->id).'" title="Delete"><i class="fa fa-trash-o left t_icon"></i></a>&nbsp;&nbsp;'; 
				}
				return $str;

			})

			->make(true);
		} 
		return view('system.wastewater_targets.index',compact('data'));

	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$region_name=Region::pluck('region_name','id')->all();
		$indicator_name=WasteWaterIndicator::pluck('name','id')->all();

		return view('system.wastewater_targets.create',compact('region_name','indicator_name'));
	}
   
   public function selectTargets(Request $request)

    {

        if($request->ajax()){

            $query =  DB::table('wastewater_indicators');
			$query =  $query->select('wastewater_target.target');
			$query =  $query->join('wastewater_target','wastewater_target.indicator_id','=','wastewater_indicators.id');
			$query =  $query->where('wastewater_target.region_id','=',Auth::user()->region_id);
			$query =  $query->where('wastewater_indicators.id','=',$request->id);
			$targets = $query->where(DB::raw('YEAR(wastewater_target.created_at)'),'=',date('Y'));
			$targets = $query->where(DB::raw('MONTH(wastewater_target.created_at)'),'=',date('m'));
			$targets = $query->first();

            $data = view('target-select',compact('targets'))->render();
            return response()->json(['options'=>$data]);
        }

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
		$validator = Validator::make($data = $request -> all(), WastewaterTargets::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}
		$data['user_id'] = Auth::user()->id;
		//$data['region_id'] = Auth::user()->region_id;


		//check if target exists
		$todaydate=date('Y-m');

		$check=WastewaterTargets::where('region_id',$data['region_id'])->where('indicator_id',$data['indicator_id'])
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
		$wastewater_targets = WastewaterTargets::create($data);
		if ($wastewater_targets) {
			return redirect() -> route('wastewater_targets.index') -> with('message', 'Data has been Created successfully') -> with('status', 'success');
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
		$wastewater_targets = WastewaterTargets::find($id);



		$region_name=Region::pluck('region_name','id')->all();
		$indicator_name=WasteWaterIndicator::pluck('name','id')->all();

		return view("system.wastewater_targets.edit", compact('wastewater_targets','region_name','indicator_name'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$validator = Validator::make($data = $request -> all(),WastewaterTargets::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}

		$wastewater_targets = WastewaterTargets::find($id);
		//$data['user_id'] = Auth::user()->id;

		if ($wastewater_targets -> update($data)) {
			return redirect() -> route('wastewater_targets.index') -> with('message', 'Data has Updated successfully') -> with('status', 'success');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$ws = WastewaterTargets::find($id);

		if (($ws->wastewaters->count() > 0)) {
            return redirect()->route('wastewater_targets.index')
            ->with('message', 'You can not Delete,Some Data are still referenced to this Target')
            ->with('status', 'danger');
         }
         else{
            
             $ws->destroy($id);
            return redirect()->route('wastewater_targets.index')
            ->with('message', 'Waste Water Target Deleted Successfully')
            ->with('status', 'success');
         }

	}

}
