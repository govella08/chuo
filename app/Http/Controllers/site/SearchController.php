<?php
namespace App\Http\Controllers\site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Elasticsearch;
use Validator;
// use App\Models\Search;

use App\Models\Event;
use App\Models\News;
use App\Models\Announcement;
use App\Models\Service;
use App\Models\Project;

class SearchController extends BaseSiteController {

    /**
     * Show the form for creating a new resource.
     * GET /search/create
     *
     * @return Response
     */
    public function search(Request $request)
    {

        /*$client = new Elasticsearch\Client();
        $validator = Validator::make($data = $request->all(), Search::$rules);

        if ($validator->fails())
        {
            return redirect()->to('/');
        }


        //clean user input
        $term = strip_tags($request->q);
        $term = filter_var($term, FILTER_SANITIZE_STRING);

        $search = new Search();

        $results =  $search->searching($term,$request->page);
        return view('site.search.index', compact('results','term'));*/


    }

    public function scoutSearch(Request $request){
        $this->validate($request,[
            'q' =>'required',
        ]);

        $term = $request->q;
        $results = [
            [
                'type' => __('label.news'),
                'url_prefix' => 'news',
                'title' => 'title',
                'content' => 'content',
                'id_type' => 'slug',
                'data' => News::search($term)->where('active',1)->get()
            ],
            [
                'type' => __('label.events'),
                'url_prefix' => 'events',
                'title' => 'title',
                'content' => 'description',
                'id_type' => 'slug',
                'data' => Event::search($term)->where('visible',1)->get()
            ],
            [
                'type' => __('label.announcements'),
                'url_prefix' => 'announcements',
                'title' => 'name',
                'content' => 'content',
                'id_type' => 'slug',
                'data' => Announcement::search($term)->where('active',1)->get()
            ],
            [
                'type' => __('label.our_services'),
                'url_prefix' => 'services',
                'title' => 'title',
                'content' => 'content',
                'id_type' => 'id',
                'data' => Service::search($term)->where('active',1)->get()
            ],
            [
                'type' => __('label.projects'),
                'url_prefix' => 'project',
                'title' => 'title',
                'content' => 'content',
                'id_type' => 'slug',
                'data' => Project::search($term)->where('active',1)->get()
            ],

            
        ];

        return view('site.search.index', compact('results','term'));
    }
}