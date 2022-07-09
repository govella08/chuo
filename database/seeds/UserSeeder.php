<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
  public function run(){

	  	// DB::table('users')->truncate();

	  	 DB::table('users')->insert([
            'name' => 'Default User',
            'email' => 'admin@newcms.go.tz',
            'password' => bcrypt('123456'),
        ]);

  }

}
