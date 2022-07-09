<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Biography;

class BiographySeeder extends Seeder
{
  public function run(){
  	DB::table('biographies')->truncate();
  	for ($i=1; $i < 2; $i++) { 
  		$bio = "bio".$i;
  		Biography::create(array(
        'name' => 'Name Here',
        'title' => 'CEO',
        'salutation' => 'Dr',
        'content' => 'Content here',
        'photo_url' => '/cms/images/person.png',
		    'active' => 1,
		    'slug' => $bio,
	   ));
  	}
	   
  }

}
