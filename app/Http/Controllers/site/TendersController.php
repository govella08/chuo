<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Tender;

use Response;
use Carbon\Carbon;

class TendersController extends BaseSiteController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenders = Tender::orderBy('created_at', 'DESC')->where('visible','=',1)->whereDate('deadline',">=",Carbon::now()->toDateString())->paginate(12);
        return view('site.tenders.index', compact('tenders'));
    }

    

}
