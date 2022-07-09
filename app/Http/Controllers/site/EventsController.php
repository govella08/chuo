<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Request;
use App\Models\Event;
use Response;
use Auth;
//use Carbon\Carbon;

class EventsController extends BaseSiteController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$events = Event::orderBy('id', 'DESC')->where('visible','1')->paginate(8);
        return view('site.events.index', compact('events'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */	
	public function show($slug)
	{

		$event = Event::findBySlug($slug);
		$current_date=strtotime(date('Y-m-d'));
		$event_date=strtotime($event->start_date);
		if($event_date >$current_date){
		$days_remained=($event_date-$current_date)/(60 * 60 * 24);;
		}
		else{
			$date_remained=null;
		}
		return view('site.events.show', compact('event','days_remained'));
	}

	

}
