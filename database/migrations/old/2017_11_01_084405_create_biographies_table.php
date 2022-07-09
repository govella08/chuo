<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiographiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('biographies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('salutation');
			$table->string('salutation_translation')->nullable();
			$table->string('photo_url');
			$table->string('slug');
			$table->string('title');
			$table->string('title_translation')->nullable();
			$table->text('content');
			$table->text('content_translation')->nullable();
			$table->boolean('active')->default(false);
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
		Schema::dropIfExists('biographies');
	}

}
