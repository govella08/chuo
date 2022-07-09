<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use Auth;

class ContactsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$contacts = Contact::orderBy('id','DESC')->paginate(5);
		return view('cms.contacts.index',compact('contacts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$request->validate(Contact::$rules);
		
		$data = $request->only('physical_address', 'phone', 'fax', 'email','hotline','active');
		$data['active']=1;
        $contact = Contact::create($data);

        if(request('physical_address_en')){
            app()->setLocale('en');
            $contact->physical_address=request('physical_address_en');
            $contact->save();

         }
        if($contact){
            return redirect('cms/contacts');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	    public function edit($id)
    {
        $contacts = Contact::find($id);
        return view("cms.contacts.edit", compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$contact = Contact::find($id);

    	$request->validate(Contact::$rules);

		$data = $request->only('physical_address', 'phone', 'fax', 'email','hotline','active');
		$data['active']=1;
        $contact->update($data);

        if(request('physical_address_en')){
            app()->setLocale('en');
            $contact->physical_address = request('physical_address_en');
            $contact->save();
        }
 
        return redirect('cms/contacts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    	//$contacts = Contact::find($id);
		Contact::destroy($id);

        return redirect('cms/contacts');
    }

}
