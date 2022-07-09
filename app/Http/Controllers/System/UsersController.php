<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use App\Jobs\SendVerificationEmail;
use App\Models\Region;
use App\Models\District;
use App\Models\Ward;
use App\Models\Village;
use App\Models\User;
use App\Models\Role;
use DB;
use Hash; 
use Auth;
use Mail;
use Datatables;
use Redirect;
use Input;
use Crypt;
class UsersController extends Controller
{

 use ResetsPasswords;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {


        if($request->ajax()){

         $users=DB::statement(DB::raw('set @rownum=0'));

         return Datatables::of(User::with('region')->select('users.*',DB::raw('@rownum := @rownum + 1 AS rownum')))->where('id','!=',Auth::user()->id)
            // ->editColumn('title', '@{!!  !!}')
         ->addColumn('region_name', function ($user) {

            return $user->region->region_name;

        })
         ->addColumn('roles', function ($user) {

            if(!empty($user->roles)){
                foreach($user->roles as $v){
                  $data="<label>". $v->display_name." </label>";
                  return $data;
              }
          }
      })
         ->addColumn('status', function ($user) {
             $str='';
             if(Auth::user()->can(['users.update_user'])){
              $str.='<a class="left" onclick="'."return confirm('Are you sure,you want to perform this Action?')".' "  href="'.route('users.update_user',Crypt::encrypt($user->id)).'" title="Edit Status">'.status($user->activated).'</a>&nbsp;&nbsp;'; 
          }
          return $str;
      })

         ->addColumn('options', function ($user) {
            $str='';
            if(Auth::user()->can(['users.show'])){
              $str.='<a class="left" href="'.route('users.show',Crypt::encrypt($user->id)).'" title="view"><i class="fa fa-eye left t_icon"></i></a>&nbsp;&nbsp;'; 
          }
          if(Auth::user()->can(['users.edit'])){
             $str.='<a class="left" href="'.route('users.edit',Crypt::encrypt($user->id)).'" title="Edit"><i class="fa fa-pencil left t_icon"></i></a>&nbsp;&nbsp;'; 
         }
         if(Auth::user()->can(['users.edit_role'])){
            $str.='<a class="left" href="'.route('users.edit_role',$user->id).'" title="Edit User Role"><i class="fa fa-pencil-square-o left t_icon"></i></a>&nbsp;&nbsp;'; 
        }
        if(Auth::user()->can(['users.delete_user'])){
         $str.='<a class="left"  onclick="'."return confirm('Are you sure,you want to perform this Action?')".' "    href="'.route('users.delete_user',$user->id).'" title="Delete"><i class="fa fa-trash left t_icon"></i></a>&nbsp;&nbsp;'; 
     }
     return $str;

 })

->make(true);
} 
return view('system.users.index',compact('users'));

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name','!=','super_admin')->pluck('display_name','id');
        $region_name=Region::pluck('region_name','id')->all();
        $district_name=array();
        $userRole=array();
        return view('system.users.create',compact('roles','region_name','userRole'));
    } 

    public function login()
    {

        return view('auth.login');
    } 

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    } 


    
    public function selectDistrict(Request $request)

    {

        if($request->ajax()){

            $district = District::where('region_id',$request->id)->pluck('district_name','id');

            $data = view('district-select',compact('district'))->render();
            return response()->json(['options'=>$data]);

        }

    }

    public function selectWard(Request $request)

    {

        if($request->ajax()){

            $ward = Ward::where('region_id',$request->id)->pluck('ward_name','id');

            $data = view('ward-select',compact('ward'))->render();
            return response()->json(['options'=>$data]);

        }

    }
    public function selectVillage(Request $request)

    {

        if($request->ajax()){

            $village = Village::where('ward_id',$request->id)->pluck('village_name','id');

            $data = view('village-select',compact('village'))->render();
            return response()->json(['options'=>$data]);

        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'region_id' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required'
            ]);

        $input = $request->all(); 

        if(filter_var($input['region_id'], FILTER_VALIDATE_INT) === false){
            return Redirect::back()->withInput(Input::all())->withErrors(['Region Name should not be empty']);
        }

        if(!empty($input['password'])){

            $this->validate($request, [
                'password' => 'required|same:confirm_password'
                ]);
            
        // $token =  hash( 'sha256',$input['password']);
            $token = hash_hmac('sha256', Password::getRepository()->createNewToken(), $input['password']);
            $input['password'] = Hash::make($input['password']);
            $input['activated'] = 1; 

            $input['api_token']=$token; 

            $user = User::create($input);
            foreach ($request->input('roles') as $key => $value) {
                $user->attachRole($value);
            }


        }
        else{ 

         $email=$input['email'];
         $token = hash_hmac('sha256', Password::getRepository()->createNewToken(), $email);
         $input['remember_token']=$token; 
         $input['api_token']=$token; 
         $input['password'] = Hash::make(generateRandomPassword(6));

         $user = User::create($input);
         foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        if( $user){

         Mail::send('system.email.email', ['token' => $token,'email'=>$email], function ($message) use($input)
         {
            $message->to($input['email'])
            ->subject('M & E Portal,Change Credential Request');
        });
     }


 }

 return redirect()->route('users.index')
 ->with('message', 'User created successfully')
 ->with('status', 'success');
}


public function resetPassword(Request $request)
{
  $this->validate($request, [
    'email' => 'required|email',
    'password' => 'required|same:password_confirmation'
    ]);

  $input = $request->all();
  $email=$input['email'];
  $token=$input['token'];
  $password=Hash::make($input['password']);
        //$password=hash( 'sha256',$input['password']);
  $activated=$input['activated'] = 1;
  $new_token=Password::getRepository()->createNewToken();

  $data=array("password"=>$password,"activated"=>$activated,"remember_token"=>$new_token);

        //check if Email Exists
  $user=User::where('email','=',$email)->where('remember_token','=',$token);
  if($user->exists()){
            //Generate New Hash Password:
     if($user->update($data)){
        return redirect('/login')
        ->with('message', 'Account Activated successfully,You may Login')
        ->with('status', 'success');
    }
    else{
        return redirect('/login')
        ->with('message', 'Account Activation Failed, Contact Administrator')
        ->with('status', 'success');

    }
}
else{
    return redirect('/login')
    ->with('message', 'Account has Expired,Contact Administrator')
    ->with('status', 'warning');
}


}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id=Crypt::decrypt($id);
        $user = User::find($id);
        return view('system.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id=Crypt::decrypt($id);
        $user = User::find($id);
        $roles = Role::where('name','!=','super_admin')->pluck('display_name','id');
        $userRole = $user->roles->pluck('id','id')->toArray();

        $get_region_id = $user->region_id;
        /* $districtName=District::where('id','=',$get_region_id)->pluck('district_name','id')->all();*/
        $regionName=Region::pluck('region_name','id')->all();


       /* $region_id= District::where('id','=',$get_region_id)->first()->region_id;
         
         $districtName = DB::table("centers")
        ->join("districts  as d", "d.id", "=", "centers.region_id")
        ->select("d.name","d.id","region_id")
        ->where('d.id', '=',$region_id)
        ->pluck('name','id')->toArray();*/

        return view('system.users.edit',compact('user','roles','userRole','regionName'/*,'districtName'*/))
        ->with('message', 'User Updated successfully')
        ->with('status', 'success');;
    }
    public function edit_role($id)
    {
        $user = User::find($id);
        $roles = Role::where('name','!=','super_admin')->pluck('display_name','id');
        $userRole = $user->roles->pluck('id','id')->toArray();

        return view('system.users.edit_role_user',compact('user','roles','userRole'));
    }

    public function status_update($id)
    {
        $id=Crypt::decrypt($id);
        $users = User::find($id);
        $activated=$users->activated;
        $name=$users->username;
        if($activated == "1"){
            $data['activated']=0;
            if($users->update($data)){
                return redirect()->route('users.index')
                ->with('message','User '.$name.' Deactivated successfully')
                ->with('status', 'success');
            }
        }
        else{
            $data['activated']=1;
            if($users->update($data)){
                return redirect()->route('users.index')
                ->with('success','User '.$name.' Activated successfully')
                ->with('status', 'success');
            }
        }
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
        $this->validate($request, [
         'region_id' => 'required',
         'email' => 'required|email|unique:users,email,'.$id,
         'password' => 'same:confirm_password',
         ]);

        $input =  $request->except(['confirm_password','roles']);

        if(filter_var($input['region_id'], FILTER_VALIDATE_INT) === false){
            return Redirect::back()->withInput(Input::all())->withErrors(['Region Name should not be empty']);
        }
        
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        } 
        

        $user = User::find($id);
        /* $user->update($input); */


        if(isset($input['check'])){
          $email=$input['email'];
          $token = hash_hmac('sha256', Password::getRepository()->createNewToken(), $email);
          $input['remember_token']=$token; 
          $input['password'] = Hash::make(generateRandomPassword(6));

          $user->update($input);

          $user->roles()->detach();
          $role = Role::find($request->roles);
          $user->roles()->attach($request->roles);

          if( $user){

             Mail::send('system.email.email', ['token' => $token,'email'=>$email], function ($message) use($input)
             {
                $message->to($input['email'])
                ->subject('M & E Portal,Change Credential Request');
            });
         }
     } 
     else{ 
         $user->update($input); 

         $user->roles()->detach();
         $role = Role::find($request->roles);
         $user->roles()->attach($request->roles);

     }

     return redirect()->route('users.index')
     ->with('message', 'User updated successfully')
     ->with('status', 'success');
 } 


 public function update_user_role(Request $request, $id)
 {
    $this->validate($request, [
        'roles' => 'required'
        ]);

    $user = User::find($id);
    $input =  $request->all();
    $user->update($input);

       /* $role = Role::find($request->roles);
        $user->roles()->attach($role);
        
        DB::table('role_user')->where('user_id',$id)->delete();

        
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }*/ 

        $user->roles()->detach();
        $role = Role::find($request->roles);
        $user->roles()->attach($request->roles);

        return redirect()->route('users.index')
        ->with('message', 'User updated successfully')
        ->with('status', 'success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user = User::find($id);

        if (($user->customers->count() > 0) || ($user->leakages->count() > 0) || ($user->meterreadings->count() > 0) || ($user->meterreplacements->count() > 0)
            || ($user->newconnections->count() > 0) || ($user->revenuecollections->count() > 0) || ($user->watertargets->count() > 0) || ($user->wastewatertargets->count() > 0) || ($user->watersales->count() > 0) || ($user->waterproductions->count() > 0)) {
            return redirect()->route('users.index')
        ->with('message', 'You can not Delete: '.$user->email.',Some Data are still referenced to this User')
        ->with('status', 'danger');
    }
    else{

     $user->destroy($id);
     return redirect()->route('users.index')
     ->with('message', 'User Deleted Successfully')
     ->with('status', 'success');
 }

}

}
