<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\PublicationCategory;

class PublicationCategoriesTableSeeder extends Seeder
{
  public function run(){

	DB::table('publication_categories')->truncate();

	PublicationCategory::create(array(
		'title_en' => 'Policies and Legislation',
		'title_sw' => 'Policies and Legislation'
	));

	PublicationCategory::create(array(
		'title_en' => 'Reports and Statistics',
		'title_sw' => 'Reports and Statistics'
	));

	PublicationCategory::create(array(
		'title_en' => 'Application Forms',
		'title_sw' => 'Application Forms'
	));

	PublicationCategory::create(array(
		'title_en' => 'Guidelines and Manuals',
		'title_sw' => 'Guidelines and Manuals'
	));

	PublicationCategory::create(array(
		'title_en' => 'Bronchures',
		'title_sw' => 'Bronchures'
	));


  }

}