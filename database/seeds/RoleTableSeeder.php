<?php

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $owner = new Role();
        $owner->name         = 'admin';
        $owner->display_name = 'Administrator'; // optional
        $owner->description  = 'Admin'; // optional
        $owner->save();


        $owner = new Role();
        $owner->name         = 'user';
        $owner->display_name = 'normal user'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();



    }
}
