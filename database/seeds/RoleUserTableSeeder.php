<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;


class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $user = User::where('email', '=', 'admin@dawasa.go.tz')->first();

            // role attach alias

            $admin = Role::where('name','=','admin')->first();
        
            // $user->attachRole($admin); // parameter can be an Role object, array, or id

            // or eloquent's original technique
            $user->roles()->attach($admin->id);
    }
}

