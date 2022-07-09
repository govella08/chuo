<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('welcome', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('summary');
			$table->string('summary_translation')->nullable();
			$table->text('content');
			$table->string('content_translation')->nullable();
			$table->boolean('visible')->default(true);
			$table->string('slug');
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
		Schema::dropIfExists('welcome');
	}

}
