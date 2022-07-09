<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('title_translation')->nullable();
			$table->string('summary');
			$table->string('summary_translation')->nullable();
			$table->text('content');
			$table->text('content_translation')->nullable();
			$table->boolean('active')->default(true);
			$table->integer('user_id');
			$table->string('slug');
			$table->string('photo_url');
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
		Schema::dropIfExists('news');
	}

}
