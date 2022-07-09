<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;

class GalleriesSeeder extends Seeder
{
  public function run(){

	  	DB::table('galleries')->truncate();

	   Gallery::create(array(
      'title_en' => 'Slideshow',
      'title_sw' => 'Slideshow',
      'type'=>'photos'
	    
	   ));

	   
  }

}
