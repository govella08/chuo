<?php namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;

use Mail;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;


use Hash;

class UserController extends BaseController
{
    use ResetsPasswords;
    

    public function authenticate(Request $request)
    {
        $inputs=request()->only('email', 'password');
        //['email' => $request->get('email'), 'password' => $request->get('password')]
        if (Auth::attempt($inputs)) {

            return redirect()->intended('/cms');
        } else {
            return redirect()->back()->withInput();
        }
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

    public function userForm($id){
       $users = User::find($id);
       return view('cms.users_mgt.edit_user', compact('users'));
   }


   public function updateUserForm(Request $request, $id,PasswordBroker $passwords){
    $validator = Validator::make($data = $request->all(), User::$rules);

    if ($validator->fails()) {
        return Redirect::back()->withErrors($validator)->withInput();
    }

        //die('here');
    $user = User::find($id);
    $user->update($data);

    $email =  $data['email'];
    if(isset($data['check'])){
      $response = $passwords->sendResetLink(['email'=>$email], function($m)
      {
        $m->subject("ML Website:Change Password Request");
    });
  }

  return redirect()->route('cms.users.create-user-form')->with('success','User Updated Successfully');

}

public function registerForm()
{
    $current_user = Auth::user();
    $users = User::whereNotIn('id', [$current_user->id])->get();
    return view('cms.users_mgt.index', compact('users'));
} 



public function createUser(Request $request, PasswordBroker $passwords)
{

    $validator = Validator::make($data = $request->all(), User::$rules);

    if ($validator->fails()) {
            //return Redirect::back()->withErrors($validator)->withInput();
        return Redirect('cms/user-registration-form')->with(['errors' => "Email already Exists"]);
    }

    $data['password'] = bcrypt('dawasawebsite');
    $user = User::create($data);

    if ($user) {
        $role = Role::where('name', '=', 'user')->first();
        $user->roles()->attach($role->id);

        $email = $request->email;

            // send a reset password link
        $response = $passwords->sendResetLink(['email'=>$email], function($m)
        {
            $m->subject("DAWASA Website Change Password Requests");
        });

        return redirect()->back();
    } 
}

public function userRolesForm($userID)
{

    $user = User::findOrFail($userID);

    $roles = DB::table('roles')
    ->leftJoin('role_user', function ($join) use ($userID) {
        $join->on('roles.id', '=', 'role_user.role_id')->where('user_id', '=', $userID);
    })->get();

    return view('cms.users_mgt.roles.user_roles', compact('user', 'roles'));
}

public function updateUserRoles(Request $request)
{

    $user = User::findOrFail($request->user_id);
    $data = $request->all();
        // return $data;

    $user->roles()->detach();

    if (isset($data['roles'])) {
        $user->roles()->attach($data['roles']);
    }

    return redirect()->back();

}




public function userPermissionsForm($roleID)
{

    $role = Role::findOrFail($roleID);

    $permissions = DB::table('permissions')
    ->leftJoin('permission_role', function ($join) use ($roleID) {
        $join->on('permissions.id', '=', 'permission_role.permission_id')->where('role_id', '=', $roleID);
    })->get();

    foreach ($permissions as &$p) {
        $p->action       = substr(strrchr($p->display_name, '.'), 1);
        $p->display_name = substr($p->display_name, 0, strripos($p->display_name, '.'));
    }

    $modules = collect($permissions)->groupBy('display_name');

    return view('cms.users_mgt.roles.role_permissions', compact('role', 'modules'));
}

public function updateUserPermissions(Request $request)
{

    $role = Role::findOrFail($request->role_id);

    $data = $request->all();

    if (isset($data['permissions'])) {
        $role->perms()->sync($data['permissions']);
    }

    return redirect()->back();

}



public function changeUserPasswordForm()
{

    return view('cms.users_mgt.change_password', compact('user'));
}

public function updateUserPassword(Request $request)
{


  $rules = array(
    'current_password'    => 'required|hashMatch'
    ,'password'           => 'required|alphaNum|min:6'
    ,'confirm_password'  => 'required|same:password'
);

  $validator = Validator::make($data = $request->all(), $rules);

  if ($validator->fails())
  {
    return Redirect::back()->withErrors($validator)->withInput();
}
$user = Auth::user();

$user->password =  Hash::make($data['password']);
if($user->update($data)){
    return redirect()->back()->with('message','Password Change Successfully');
}




}

public function destroy($id){

    $user = User::destroy($id);
    
    return redirect("cms/user-registration-form");
}

}
