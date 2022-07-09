<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

		public static $rules = [
		'description' => '',
		'display_name' => 'required',
		'name' => 'required',
	];
	protected $fillable = ['description', 'display_name', 'name'];



}
