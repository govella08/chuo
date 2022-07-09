<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VisitorsLog;
use Carbon\Carbon;

class VisitorsLogController extends BaseSiteController
{
	public function log(Request $request)
	{
		$client = VisitorsLog::where('browserId','=',$request->browserId)->get()->last();
		if($client){
            //update
			$logs = $client->save($request->all());
			if(!$logs) {
				return response()->json(['error'=>[
					'status' => 401,
					'message' => 'Bad Request',
					'details' => 'Failed to record the log'
				]],200);
			}
			$logs = $client;
		} else {
            //create new log
			$logs = VisitorsLog::create($request->all());
			if(!$logs) {
				return response()->json(['error'=>[
					'status' => 401,
					'message' => 'Bad Request',
					'details' => 'Failed to record the log'
				]],200);
			}
		}
		
		$data = [
			'today' => number_format($this->today()->count()),
			'yesterday' => number_format($this->yesterday()->count()),
			'thisWeek' => number_format($this->thisWeek()->count()),
			'thisMonth' => number_format($this->thisMonth()->count()),
			'all' => number_format($this->all()->count())
		];
		return response()->json($data,200);
	}

	public function all()
	{
		return VisitorsLog::all();
	}


	public function today(){
		return VisitorsLog::whereDate('created_at', '=', Carbon::today()->toDateString())->get();
	}

	public function yesterday(){
		return VisitorsLog::whereDate('created_at', '=', Carbon::yesterday()->toDateString())->get();
	}

	public function thisWeek(){
		$now = Carbon::now();
		$startDate = $now->startOfWeek()->toDateString();
		$endDate = $now->endOfWeek()->toDateString();

		return VisitorsLog::whereBetween("created_at",[$startDate,$endDate])->get();

	}

	public function thisMonth(){
		return VisitorsLog::whereMonth("created_at","=",date("m"))->get();

	}
}
