<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Event;
use Response;
use Auth;

class AllocationController extends BaseSiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allocations = Allocation::orderBy('id', 'DESC')->paginate(8);
        return view('site.allocations.index', compact('allocations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $event = Event::findBySlug($slug);
		// $current_date=strtotime(date('Y-m-d'));
		// $event_date=strtotime($event->start_date);
		// if($event_date >$current_date){
		// $days_remained=($event_date-$current_date)/(60 * 60 * 24);;
		// }
		// else{
		// 	$date_remained=null;
		// }
		// return view('site.events.show', compact('event','days_remained'));
    }

    
}
