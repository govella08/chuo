<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('title_translation')->nullable();
			$table->text('content');
			$table->string('content_translation')->nullable();
			$table->string('duration');
			$table->string('duration_translation')->nullable();
			$table->string('owner');
			$table->string('sponsor');
			$table->string('slug');
			$table->string('file');
			$table->string('file_translation')->nullable();
			$table->date('start_date');
			$table->date('end_date');
			$table->boolean('active');
			$table->string('project_status');
			$table->integer('category_id')->unsigned()->index();
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
		Schema::dropIfExists('projects');
	}

}
