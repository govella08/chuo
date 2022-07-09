<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqsController extends BaseSiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$faqs = Faq::orderBy('id', 'DESC')->paginate(10);
        return view('site.faqs.index', compact('faqs'));
	}

	
}
