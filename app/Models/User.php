<?php namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/*use App\Traits\TrackableTrait;
use App\Traits\TrackableInterface;*/
/*class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;


	protected $table = 'users';


	protected $fillable = ['name', 'email', 'password'];

	protected $hidden = ['password', 'remember_token'];

}
*/

class User extends Authenticatable
{
	use Notifiable;
    use EntrustUserTrait; // add this trait to your user model
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules =[
    	'email'=>'required|email',
    	'name'=>'required',
    ];

 

    public function news()
    {
        return $this->hasMany('App\Models\News');
    }

}