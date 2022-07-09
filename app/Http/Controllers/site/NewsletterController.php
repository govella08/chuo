<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Newsletter;

use Response;
use Redirect;
use Validator;
use Input;


class NewsletterController extends BaseSiteController {


    /**
     * Display a listing of the resource.
     * GET /Newsletter
     *
     * @return Response
     */

    public function index()
    {   

        return view('site.newsletter.index');
    }

    public function store(Request $request)
    {
        

         $validator = Validator::make($data=$request->all(), Newsletter::$rules);

        if ($validator->fails())
        {

             return Redirect::back()->withErrors($validator)->withInput();
        }
        //check if email exists:
        if (Newsletter::where('email', '=', Input::get('email'))->exists()) {
           return redirect()->back()->with('message', 'Already Registered');
        }
        $newsletter = Newsletter::create($data);

        if($newsletter){
             return view("site.newsletter.thanks");
        }
    }


    /**
     * Show the form for creating a new resource.
     * GET /Newsletter/create
     *
     * @return Response
     */
    public function thanks()
    {
        View::make('site.newsletter.thanks');
    }



}
