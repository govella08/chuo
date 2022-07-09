<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Page_category;

use Response;
use Validator;
use Redirect;
use File;
use Config;

class ContactUsController extends BaseController {
    
    public static  $video_path;

    public function __construct() {
        parent::__construct();
        self::$video_path= app_path().'/../resources/views/contactus/'.'contactus.json';
    }

    /**
     * Display a listing of settings
     *
     * @return Response
     */ 
    
    public function index()
    {
        $setting = File::get(self::$video_path);
        $setting = json_decode($setting);
   
        return view('contactus.index', compact('setting'));
    }




    /**
     * Show the form for creating a new settings
     *
     * @return Response
     */
    public function create()
    {
        $setting = File::get(self::$video_path);
        $setting = json_decode($setting); 
        return View::make('contactus.create',compact('setting'));
    }

    /**
     * Store a newly created settings in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $settings = File::put(self::$video_path,json_encode($data));
        // return $data;


        return redirect()->back();
    }

    public static function settings(){
        $settings = File::get(app_path().'/views/settings/'.'video.json');
        return  json_decode($settings);
    }

    

}