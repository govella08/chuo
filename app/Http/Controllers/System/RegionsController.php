<?php
namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Region;

use Response;
use Validator;
use Redirect;
use Auth; 
use Crypt;
class RegionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		$data = Region::orderBy('id', 'DESC') -> paginate(20);
		return view('system.regions.index', compact('data')) -> with('i', ($request -> input('page', 1) - 1) * 15);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('system.regions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$validator = Validator::make($data = $request -> all(), Region::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}
		//$data['user_id'] = Auth::user()->id;
		$region = Region::create($data);

		if ($region) {
			return redirect() -> route('regions.index') -> with('message', 'Region: ' . $data['region_name'] . ',Created successfully') -> with('status', 'success');
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
		$region = Region::find($id);

		return view("system.regions.edit", compact('region'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$validator = Validator::make($data = $request -> all(), Region::$rules);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}

		$region = Region::find($id);
		//$data['user_id'] = Auth::user()->id;

		if ($region -> update($data)) {
			return redirect() -> route('regions.index') -> with('message', 'Region: ' . $region ->region_name . ',Updated successfully') -> with('status', 'success');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$ws = Region::find($id);

		if (($ws->customers->count() > 0) || ($ws->leakages->count() > 0) || ($ws->meterreadings->count() > 0) || ($ws->meterreplacements->count() > 0)
            || ($ws->newconnections->count() > 0) || ($ws->revenuecollections->count() > 0) || ($ws->watertargets->count() > 0) || ($ws->wastewatertargets->count() > 0) || ($ws->watersales->count() > 0) || ($ws->waterproductions->count() > 0)) {
           return redirect() -> route('regions.index') -> with('message', 'You can not Delete: ' . $ws ->region_name . ',Some Data are still referenced to this Region') -> with('status', 'danger');
         }
         else{
            
             $ws->destroy($id);
           return redirect() -> route('regions.index') -> with('message', 'Region has been deleted successfully') -> with('status', 'success');
         }

	}

}
