<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('title_translation')->nullable();
			$table->string('slug');
			$table->boolean('status')->default(0);
			$table->boolean('modifiable')->default(1);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('page_categories');
	}

}
