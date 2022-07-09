<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Unit;

use Response;
use Validator;
use Redirect;

class UnitsController extends BaseSiteController {

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Unit::all();
        return view('site.unit.index', compact('departments'));
    }

}
