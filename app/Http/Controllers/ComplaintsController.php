<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Complaint;

use Response;
use Validator;
use Redirect;

class ComplaintsController extends BaseController {

    public function index()
    {
        $complains = Complaint::orderBy('id', 'DESC')->paginate(10);
        return view('complains.index', compact('complains'));
    }

    public function show($id){
        $complain = Complaint::find($id);

        if (!$complain->read) {
            $complain->update(['read' => true]);
        }

        return view('complains.show', compact('complain'));
    }


    public function destroy($id)
    {
        $complain = Complaint::destroy($id);

        return redirect('cms/complains');
    }


}
