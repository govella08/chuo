<?php namespace App\Http\Controllers\site;

use App\Highlight;
use App\Http\Requests;
use App\Models\AcademicCampus;
use App\Models\Alumni;
use App\Models\Announcement;
use App\Models\Biography;
use App\Models\Event;
use App\Models\ExternalLink;
use App\Models\Gallery;
use App\Models\HowDoI;
use App\Models\Medias;
use App\Models\News;
use App\Models\PressRelease;
use App\Models\Programmes;
use App\Models\Publication;
use App\Models\QuickLink;
use App\Models\RelatedLink;
use App\Models\Service;
use App\Models\Speech;
use App\Models\WelcomeNote;
use DB;

class HomeController extends BaseSiteController
{

    public function index()
    {
        $latest_news_first = News::orderBy('id', 'DESC')->take(1)->get();
        $news_list = News::orderBy('id', 'DESC')->take(12)->get();

        $speeches = Speech::orderBy('id', 'DESC')->paginate(5);
        $highlights = Highlight::orderBy('id', 'DESC')->take(5)->get();
        $biographies = Biography::where('active', '=', 1)->orderBy('id', 'ASC')->take(2)->get();

        $biography = Biography::orderBy('id', 'ASC')->first();
        $biography1 = Biography::orderBy('id', 'ASC')->skip(1)->first();
        $news = News::orderBy('id', 'DESC')->take(3)->get();

        $campuses = AcademicCampus::orderBy('id', 'DESC')->take(3)->get();

        $programmes = Programmes::orderBy('level_id', 'ASC')->get();
        $events = Event::orderBy('id', 'DESC')->take(4)->get();

        $alumnis = Alumni::orderBy('id', 'DESC')->take(4)->get();

        $quicklinks = QuickLink::orderBy('id', 'DESC')->limit(5)->get();
        $relatedlinks = RelatedLink::orderBy('id', 'DESC')->limit(5)->get();
        $recentphotos = Gallery::orderBy('id', 'DESC')->paginate(5);


        $recentvideos = DB::table('media')->where('url', '!=', '')->orderBy('id', 'DESC')->take(1)->first();

        $statevisits = Gallery::orderBy('id', 'DESC')->limit(3)->get();
        //$statevisits=Gallery::where('category','=','1')->orderBy('id','DESC')->limit(3)->get();

        $howdoi = HowDoI::orderBy('id', 'DESC')->limit(4)->get();

        $services = Service::orderBy('id', 'DESC')->limit(3)->get();

        $pressreleases = PressRelease::orderBy('id', 'DESC')->where('active', '=', 1)->paginate(4);

        $publication = Publication::orderBy('id', 'DESC')->where('active', '=', 1)->limit(5)->get();

        /*$documents = Publication::whereIn('category_id',function($query){
        	$query->select('id')->from('publication_categories')->where('slug','like','%document%');
        })->orderBy('id', 'DESC')->where('active','=',1)->limit(5)->get();*/

        $welcome = WelcomeNote::where('visible', 1)->first();

        $video = DB::table('galleries')
            ->join('media','gallery_id','=','galleries.id')
            ->where('galleries.type','=','videos')->select('media.*')->orderBy('created_at', 'desc')->first();

//        dd($video);

        $galleries = Gallery::where('type', '=', "photos")->where('featured', 0)->with('photos')->orderBy('created_at', 'DESC')->take(5)->get();

        /*         $instituations_category = Page_category::where('slug', 'ministry-institutions')->first();
                 $instituations = Page::where('page_category_id', $instituations_category->id)->get();*/

        $external_links = ExternalLink::all();

        $slideshow = Gallery::where('featured', 1)->where('type', '=', 'photos')->first();
        if ($slideshow == null) {
            $slideshow = [];
        } else {
            $slideshow = $slideshow->photos()->orderBy('id', 'DESC')->limit(25)->get();
        }

        $announcements = Announcement::orderBy('id', 'DESC')->where('active', 1)->limit(3)->get();

//		dd($slideshow->toArray());
        return view("site/home", compact(
            'alumnis',
            'programmes',
            'campuses',
            'news',
            'events',
            'biographies',
            'biography',
            'biography1',
//            'documents',
            'slideshow',
            'quicklinks',
            'recentphotos',
            'recentvideos',
            'news_list',
            'pressreleases',
            'speeches',
            'highlights',
            'howdoi',
            'relatedlinks',
            'publication',
            'welcome',
            'announcements',
            'external_links',
            'services',
            'galleries',
            'video'
        ));
    }
}
