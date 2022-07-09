<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use App\Models\Complaint;
use App\Models\Setting;
use View;

class BaseController extends Controller {

	protected $unread_complaints;
	protected $settings;

    public function __construct() 
    {
        // Fetch the Site Settings object
        /*$this->unread_complaints = Complaint::where('read', '=', 0)->count();
        View::share('unread_complaints', $this->unread_complaints);*/
        
        $this->settings = Setting::all();
        View::share('settings', $this->settings);
    }

}
