<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Department;
use App\Models\RegionalOffice;
use Illuminate\Http\Request;

class RegionalOfficesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $regional_offices = RegionalOffice::orderBy('id', 'DESC')->get();
        return view('regional_office.index', compact('regional_offices'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('regional_office.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $request->validate(RegionalOffice::$rules);

        $inputs = $request->except('physical_address_en','content_en');

        $regional_office = RegionalOffice::create($inputs);

         if(request('physical_address_en')){
            app()->setLocale('en');
            $regional_office->physical_address=request('physical_address_en');
            $regional_office->save();
         }

         if(request('content_en')){
            app()->setLocale('en');
            $regional_office->content=request('content_en');
            $regional_office->save();
         }

        if($regional_office){
            return redirect('cms/regional_office');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $regional_office = RegionalOffice::find($id);

        return view("regional_office.edit", compact('regional_office'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        $request->validate(RegionalOffice::$rules);

        $inputs = $request->except('physical_address_en','content_en');

        $regional_office = RegionalOffice::find($id);

        $regional_office->update($inputs);

        if(request('physical_address_en')){
            app()->setLocale('en');
            $regional_office->physical_address=request('physical_address_en');
            $regional_office->save();
        }

        if(request('content_en')){
            app()->setLocale('en');
            $regional_office->content=request('content_en');
            $regional_office->save();
        }

        

        return redirect('cms/regional_office');
      
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $department = RegionalOffice::destroy($id);

        return redirect('cms/regional_office');
	}

}
