<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReportIssue;
use Guzzle;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Validator;
use Redirect;


class OnlineServicesController extends BaseSiteController
{

    private $service_codes;
    private $jurisdictions;
    public function __construct(){
        parent::__construct();
        $path = storage_path() . "/json/";
        $this->service_codes = collect(json_decode(file_get_contents($path."services.json")));
        $this->jurisdictions = collect(json_decode(file_get_contents($path."jurisdictions.json")));

    }

    /**
     * { water connection view function }
     *
     * @return     <html>  ( view that shows the water connection form )
     */
    public function waterConnection(){
        return view('site.online_services.water_connection')->with(['jurisdictions'=>$this->jurisdictions,'service_codes'=>$this->service_codes]);
    }


    /**
     * Saves a new water connection request from customer.
     *
     * @param      \Illuminate\Http\Request  $request  The request
     */
    public function saveNewWaterConnection(Request $request){

        $response = Guzzle::get('https://sample-anzuann.firebaseio.com/accounts.json');
        $contentType = $response->getHeaderLine('content-type');
        $statusCode = $response->getStatusCode();
        dd(json_decode($response->getBody()));
        die();
    }

    public function reportIssue(){
        //dd($this->jurisdictions);
        return view('site.online_services.report_issue')->with(['jurisdictions'=>$this->jurisdictions,'service_codes'=>$this->service_codes]);
    }

    public function saveReportedIssue(Request $request){

        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'ward_name' => 'required',
            'street_name' => 'required',
            'description' => 'required',
            'phone_number' => 'required|regex:/(255)[0-9]{9}/',
            'service_type' => 'required',
            'nearest_office' => 'required',
        ]);

        $data = $request->all();
        
        try {
            // Mail::to('nassor.nassor2@ega.go.tz')
            // ->send(new ReportIssue($data));
            $response = Guzzle::post('http://196.41.60.218/crm/open311/requests.json',[
                'form_params' => [
                    'jurisdiction_id'=>$request->nearest_office,
                    'service_code' => $request->service_type,
                    'phone' => $request->phone_number,
                    'email' => $request->email, //optinal
                    'first_name' => $request->first_name, //options
                    'last_name' => $request->last_name, //optional
                    'description' => $request->description,
                    'address_string' => 'Ward: '.$request->ward_name .', Street: '.$request->street_name,
                    'method' => 'Website',
                    
                ]
            ]);
            //$res = json_decode($response);
            //dd(json_decode($response));
            $body = json_decode($response->getBody());
            $service_request_id = $body[0]->service_request_id;
            
            $contentType = $response->getHeaderLine('content-type');
            $statusCode = $response->getStatusCode();
            

            if($statusCode == 201) {
                flash("Your request has been sent successfully.")->success()->important();
            } else {
                flash("Sorry! Sorry! system has failed to submit your request. Please try again")->error()->important();
                return Redirect::back()->withInput();
            }
        } catch(\Exception $e){
            flash("Sorry! system has failed to submit your request. Please try again")->error()->important();
            return Redirect::back()->withInput();
        }

        return Redirect::back();



    }


    public function billRegistration(){
        return view('site.online_services.bill_registration');
    }

    public function saveBillRegistration(Request $request){
        //validate inputs
        $this->validate($request,[
            'account_number' => 'required',
            'full_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|regex:/(255)[0-9]{9}/',
        ]);
        //dd($request->all());
        //make the api request 
        try {
            $url = "http://196.41.60.218/obill/apis/register.php";
            $response = Guzzle::post($url,[
                'body' => json_encode([
                    'accountno'=>$request->account_number,
                    'full_name' => $request->full_name,
                    'phone_no' => $request->phone_number,
                    'email_address' => $request->email,  
                ]),
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);

            $statusCode = $response->getStatusCode();
            if($statusCode == 200){
                $body = json_decode($response->getBody());
                $code = $body->success;
                $message = $body->message;
                if($code == 201){
                    //successfully register
                    flash($message ." You will receive SMS to activate your account <a href='". url("online_services\customer_account_activation") ."'>click here to activate your account</a>")->important()->important();
                    return Redirect::back()->withInput();
                } else {
                    //failed to register
                    flash($message)->error()->important();
                    return Redirect::back()->withInput();
                }
            } else {
                flash("Sorry! This service is not available right now, Please try again later.")->error()->important();
                return Redirect::back()->withInput();
            }


        } catch(\Exception $e){
           //dd($e);
           flash("Sorry! This service is not available right now, Please try again later.")->error()->important();
           return Redirect::back()->withInput();
       }





   }

   public function billRequest(){
    return view('site.online_services.bill_request');
}

public function getBillDeatils(Request $request){

    $this->validate($request,[
        'account_number' => 'required'
    ]);

    try {

        // $response = Guzzle::get('http://196.41.60.218/obill/ega_bill_end_point.php?cust_acc='.$request->account_number);
        $url = "http://196.41.60.218/obill/apis/ega_bill_end_point_req.php";
        $response = Guzzle::post($url,[
            'body' => json_encode([
                'cust_acc'=>$request->account_number,
                'password' => $request->password,  
            ]),
            'headers' => [
                'content-type' => 'application/json'
            ]
        ]);
        $statusCode = $response->getStatusCode();

        if($statusCode == 200){
            $body = json_decode($response->getBody());
            if(isset($body->success) && $body->success==400) {
                flash($body->message)->error()->important();
                return Redirect::back()->withInput();
            }
            $bill = $body->cusbill[0];
            $template = '<div id="bill-details">
            <h4 class="text-center">DAWASA ONLINE BILL</h4>
            <hr>
            <table class="table">
            <tbody>
            <tr>
            <th>CUSTOMER NAME</th> <th>Account Number: '. $bill->cust_acc .'</th>

            </tr>
            <tr>
            <td>'. $bill->SURNAME .'</td> <td>Control #: '. $bill->GEPG_CONTROL_NO .' <br>
            CN Expiry Date:  
            </td>
            </tr>
            <tr>
            <td>'.$bill->SURNAME.'</td> <td>'.$bill->cust_acc.'</td>
            </tr>
            <tr>
            <th>Current Balance</th> <td>'. $bill->CURRENT_BALANCE .'</td>
            </tr>
            <tr>
            <th>Current Charges</th> <td>'. $bill->CURRENT_CHARGES .'</td>
            </tr>
            <tr>
            <th>Opening Balance</th> <td>'. $bill->OPENING_BALANCE .'</td>
            </tr>
            <tr>
            <th>Reading Date</th> <td>'. $bill->DATE_OF_READING .'</td>
            </tr>
            <tr>
            <th>Current Reading</th> <td>'. $bill->CR_READING .'</td>
            </tr>
            <tr>
            <th>Previous Reading</th> <td>'. $bill->PR_READING .'</td>
            </tr>
            <tr>
            <th>Consumptions</th> <td>'. $bill->CONSUMPTION .'</td>
            </tr>

            </tbody>
            </table>
            <h5>Make Payments through,</h5>
            <h6>Mobile Payments: M-Pesa, tIGO-PESA, Airtel Money, Hallo Pesa and T-Pesa</h6>
            <h6>Banks: CRDB and NMB</h6>
            <br><br>
            <h5><b>Callcenter : 0800110064</b></h5>
            </div>';
                //flash()->overlay($template,'DAWASA ONLINE BILL');
            flash($template)->success();
               // dd($bill);
            return Redirect::back()->withInput();
        } else {
            flash("Sorry! This service is not available right now, Please try again later.")->error()->important();
            return Redirect::back()->withInput();
        }

    } catch(\Exception $e){
           //dd($e);
     flash("Sorry! This service is not available right now, Please try again later.")->error()->important();
     return Redirect::back()->withInput();
 }

}

public function customerAccountActivation(){
    return view('site.online_services.customer_account_activation');
}

public function activateCustomerAccount(Request $request){
    //validate inputs
    $this->validate($request,[
        'account_number' => 'required',
        'activation_code' => 'required',
        'password' => 'required|min:8',
        'confirm_password' => 'required|min:8',
    ]);
        //denie if password & confirm password do not match
    if($request->password !== $request->confirm_password){
        flash("Password do not match")->error()->important();
        return Redirect::back()->withInput();
    }

    try {
        $url = "http://196.41.60.218/obill/apis/activate.php";
        $response = Guzzle::post($url,[
            'body' => json_encode([
                'accountno'=>$request->account_number,
                'act_code' => $request->activation_code,
                'password' => $request->password,  
            ]),
            'headers' => [
                'content-type' => 'application/json'
            ]
        ]);

        $statusCode = $response->getStatusCode();
        if($statusCode == 200){
            $body = json_decode($response->getBody());
            //dd($body);
            $code = $body->success;
            $message = $body->message;
            if($code == 201){
                    //successfully register
                flash($message)->important()->important();
                return Redirect::back()->withInput();
            } else {
                    //failed to register
                flash($message)->error()->important();
                return Redirect::back()->withInput();
            }
        } else {
            flash("Sorry! This service is not available right now, Please try again later.")->error()->important();
            return Redirect::back()->withInput();
        }


    } catch(\Exception $e){
       dd($e);
       flash("Sorry! This service is not available right now, Please try again later.")->error()->important();
       return Redirect::back()->withInput();
   }
}

public function changeAccountPassword(){
    return view('site.online_services.change_account_password');
}

public function saveChangedAccountPassword(Request $request){
     //validate inputs
    $this->validate($request,[
        'account_number' => 'required',
        'current_password' => 'required',
        'new_password' => 'required|min:8',
        'confirm_password' => 'required|min:8',
    ]);
        //denie if password & confirm password do not match
    if($request->new_password !== $request->confirm_password){
        flash("Password do not match")->error()->important();
        return Redirect::back()->withInput();
    }
    //dd($request->all());
    try {
        $url = "http://196.41.60.218/obill/apis/changepassword.php";
        $response = Guzzle::post($url,[
            'body' => json_encode([
                'accountno'=>$request->account_number,
                'oldpassword' => $request->current_password,
                'newpassword' => $request->new_password,  
            ]),
            'headers' => [
                'content-type' => 'application/json'
            ]
        ]);

        $statusCode = $response->getStatusCode();
        if($statusCode == 200){
            $body = json_decode($response->getBody());
           // dd($body);
            $code = $body->success;
            $message = $body->message;
            if($code == 201){
                    //successfully register
                flash($message)->important()->important();
                return Redirect::back()->withInput();
            } else {
                    //failed to register
                flash($message)->error()->important();
                return Redirect::back()->withInput();
            }
        } else {
            flash("Sorry! This service is not available right now, Please try again later.")->error()->important();
            return Redirect::back()->withInput();
        }


    } catch(\Exception $e){
       dd($e);
       flash("Sorry! This service is not available right now, Please try again later.")->error()->important();
       return Redirect::back()->withInput();
   }
}





}
