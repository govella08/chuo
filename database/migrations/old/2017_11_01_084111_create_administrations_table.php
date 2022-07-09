<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('administrations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('fullname');
			$table->string('title');
			$table->string('title_translation')->nullable();
			$table->text('content');
			$table->text('content_translation')->nullable();
			$table->string('photo_url');
			$table->integer('position')->unsigned()->nullable();
			$table->integer('category_id')->unsigned()->index();
			$table->foreign('category_id')->references('id')->on('administration_groups')->onDelete('cascade');
			$table->integer('group_id')->unsigned()->index();
			$table->foreign('group_id')->references('id')->on('administration_groups')->onDelete('cascade');
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
		Schema::dropIfExists('administrations');
	}

}
