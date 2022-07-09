<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('title_translation')->nullable();
			$table->text('description');
			$table->text('description_translation')->nullable();
			$table->date('start_date');
			$table->date('end_date');
			$table->string('start_time');
			$table->string('end_time');
			$table->string('fee');
			$table->string('location');
			$table->string('location_translation')->nullable();
			$table->string('infophone');
			$table->string('infoemail');
			$table->string('slug');
			$table->boolean('visible');
			$table->string('flier');
			$table->string('participants');
			$table->string('participants_translation')->nullable();
			$table->string('objectives');
			$table->string('objectives_translation')->nullable();
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
		Schema::dropIfExists('events');
	}

}
