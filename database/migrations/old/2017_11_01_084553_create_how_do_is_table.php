<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHowDoIsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('how_do_is', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('title_translation')->nullable();
			$table->text('content');
			$table->text('content_translation')->nullable();
			$table->integer('active');
			$table->integer('user_id');
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
		Schema::dropIfExists('how_do_is');
	}

}
