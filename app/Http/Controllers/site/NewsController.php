<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends BaseSiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$news_list = News::orderBy('id', 'DESC')->where('active','=',1)->paginate(6);
        return view('site.news.index', compact('news_list'));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$news = News::findBySlug($slug);
		return view('site.news.show', compact('news'));
	}

}
