<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\RelatedLink;
use App\Models\QuickLink;
use App\Models\Announcement;
use App\Models\Publication;
use App\Models\SocialLink;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Event;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Photo;
use App\Models\StaffEmail;
use App\Models\GoogleAnalytic;

use App\Models\GoogleMap;
use App\Models\HowDoI;

use Sarfraznawaz2005\VisitLog\Facades\VisitLog;
use View;
use DB;
use Response;


class BaseSiteController extends Controller {

    protected $related_links;
    protected $quick_links;
    protected $social_links;
    protected $announcements;
    protected $recent_announcements;
    protected $contact;   
    protected $recent_news;
    protected $galleries;
    protected $photos;
    protected $publications;  
    protected $staffemail;
    protected $google_analytics; 
    protected $google_maps; 
    protected $howdoi;   
    protected $video;  
    protected $left_events; 
    

    protected $visitorsLogs;

    

    public function __construct() 
    {

        $this->related_links = RelatedLink::orderBy('id', 'DESC')->take(5)->get();
        View::share('related_links', $this->related_links);

        $this->quick_links = QuickLink::orderBy('id', 'DESC')->take(5)->get();
        View::share('quick_links', $this->quick_links);
        
        $this->contact = Contact::orderBy('id','ASC')->limit(1)->first();
        View::share('contact', $this->contact);

        $this->google_analytics = GoogleAnalytic::orderBy('id','desc')->first();
        View::share('google_analytics', $this->google_analytics);

        $this->social_links = SocialLink::all();
        View::share('social_links', $this->social_links); 

        $this->google_maps = GoogleMap::orderBy('id','desc')->first();
        View::share('google_maps', $this->google_maps);

        $this->announcements = Announcement::orderBy('id', 'DESC')->take(2)->get();
        View::share('announcements', $this->announcements);

        $this->recent_announcements = Announcement::orderBy('id', 'DESC')->take(2)->get();
        View::share('recent_announcements', $this->recent_announcements);

        $this->recent_news = News::orderBy('id', 'DESC')->where('active','=',1)->take(3)->get();
        View::share('recent_news', $this->recent_news);


        $type = "photos";
        $this->galleries = Gallery::where('type','=',$type)->where('featured',0)->with('photos')->orderBy('created_at', 'DESC')->paginate(5);
        View::share('galleries', $this->galleries);

        $this->publications = Publication::orderBy('id', 'DESC')->where('active','=',1)->take(5)->get();
        View::share('publications', $this->publications);


        $this->staffemail = StaffEmail::orderBy('id','desc')->first();
        View::share('staffemail', $this->staffemail);

        $this->howdoi = HowDoI::orderBy('id','desc')->limit(4)->get();
        View::share('howdoi', $this->howdoi);

        $this->video=DB::table('media')->where('url','!=','')->orderBy('id','DESC')->take(1)->first();
        View::share('video', $this->video);

        $this->left_events = Event::orderBy('id', 'DESC')->where('visible','1')->limit(3)->get();
        View::share('left_events', $this->left_events);

//        $this->prepareVisitorsLogs();

    }


    private function prepareVisitorsLogs(){
        VisitLog::save();

        $this->visitorsLogs = (Object)[
            "all" => VisitLog::all()->count(),
            "today" => VisitLog::today()->count(),
            "yesterday" => VisitLog::yesterday()->count(),
            "thisWeek" => VisitLog::thisWeek()->count(),
            "thisMonth" => VisitLog::thisMonth()->count(),
        ];

        View::share('visitorsLogs', $this->visitorsLogs);

    }
}
