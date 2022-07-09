<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Contact;
use App\Models\EmailConfiguration;

use Response;
use Validator;
use Redirect;
use File;
use Mail;

class ComplaintsController extends BaseSiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = ['none' => 'Choose Complaint Category', 'comments' => 'Comments', 'questions' => 'Questions', 'complaints' => 'Complaints'];

		return view('site.complains.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Complaint::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        //$complain = Complaint::create($request->all());

        //
        $email_data = array(
            'names' =>  $request->get('names'),
            'email' =>  $request->get('email'),
            'subject' => $request->get('subject'),
            'text' =>  "Name: ". $request->get('firstname')." ". $request->get('surname')." Phone: ". $request->get('phone')."  Email: ".  $request->get('email')."<br/>". $request->get('message'),
            'receiver' => ""
        );
        $contact=Contact::orderBy('id','ASC')->first();
        $data=$contact->email;
        if( !empty($contact->email)){
            $email_data['receiver']=$contact->email;

            $complain=Mail::send(['html' =>'site.complains.email'], $email_data, function($message) use ($email_data){
                $message->to($email_data['receiver'])->from($email_data['email'], $email_data['names'])->
                replyTo($email_data['email'], $email_data['names'])->subject($email_data['subject']);
            });
        }

        if($complain){
            return view('site.complains.success');
        }
    }


}
