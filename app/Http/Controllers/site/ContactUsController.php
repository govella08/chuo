<?php namespace App\Http\Controllers\site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Tender;
use App\Models\Complaint;
use App\Models\EmailConfiguration;
use App\Models\Contact;
use App\Models\Offices;

use Response;
use Redirect;
use Validator;
use File;
use Mail;


class ContactUsController extends BaseSiteController {


    /**
     * Display a listing of the resource.
     * GET /contact
     *
     * @return Response
     */
    public function index()
    {   
        //$offices=Offices::orderBy('id','asc')->where('active',1)->pluck('name','id');
        //return view('site.contactus.index',compact('offices'));
        $contacts = Contact::orderBy('id','DESC')->get()->first();
		return view('site.contactus.index',compact('contacts'));
    }
    public function store(Request $request)
    {
        

        /*print_r("<pre>");
        print_r($request->all());
        die();*/
        $validator = Validator::make($request->all(), Contact::$rules_email);

        if ($validator->fails())
        {
             return Redirect::back()->withErrors($validator)->withInput();
        }

        $email_data = array(
            'names' =>  $request->get('names'),
            'email' =>  $request->get('email'),
            'phone' =>  $request->get('phone'),
            'subject' => $request->get('subject'),
            'text' => "  Email: ".  $request->get('email')."<br/>". $request->get('phone')."<br/>". $request->get('message')."<br/>",
            'receiver' => ""
        );
        //$contact=Offices::where('id','=',$request->get('office_id'))->first();
        $contact=Contact::orderBy('id','ASC')->first();
            $email_data['receiver']=$contact->email;
            $send_email=Mail::send(['html' =>'site.contactus.email'], $email_data, function($message) use ($email_data){
                $message->to($email_data['receiver'])->replyTo($email_data['email'], $email_data['names'])->subject($email_data['subject']);
            });
              //die("email sent");
            if($send_email){
               return view("site.contactus.thanks");
            }
            else{
                echo "Email not sent";
            }
    }


    /**
     * Show the form for creating a new resource.
     * GET /contact/create
     *
     * @return Response
     */
    public function thanks()
    {
        View::make('site.contactus.thanks');
    }



}
