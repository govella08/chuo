<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Cardiac;
use App\Models\CardiacCategory;
class SitemapController extends BaseSiteController {

	public function index()
	{
		
        return view('site.sitemap.index');
    }
	
}
