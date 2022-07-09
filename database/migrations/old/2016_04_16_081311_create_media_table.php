<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('title_translation')->nullable();
			$table->text('content');
			$table->text('content_translation')->nullable();
			$table->string('mime')->nullable();
			$table->string('path')->nullable();
			$table->string('url')->nullable();
			$table->string('filename')->nullable();
			$table->string('iconurl')->nullable();
			$table->string('slug');
			$table->integer('gallery_id')->unsigned()->index();
			$table->boolean('status')->default(1);
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
		Schema::dropIfExists('media');
	}

}
