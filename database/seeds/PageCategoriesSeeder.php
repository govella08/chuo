<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page_category;

class PageCategoriesSeeder extends Seeder
{
  public function run(){

	  	DB::table('page_categories')->truncate();

	   Page_category::create(array(
      'title_en' => 'Normal',
      'title_sw' => 'Kurasa',
      'slug' => 'services',
	    'modifiable' => 0,
	    'status' => 1
	   ));
     Page_category::create(array(
      'title_en' => 'Services',
      'title_sw' => 'Huduma',
      'slug' => 'services',
      'modifiable' => 0,
      'status' => 1
     ));


  }

}