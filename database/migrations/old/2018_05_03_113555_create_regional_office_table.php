<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionalOfficeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('regional_offices', function(Blueprint $table)
        {
            $table->increments('id');
			$table->integer('country_id')->unsigned();
			$table->string('name');
			$table->text('physical_address');
			$table->string('physical_address_translation')->nullable();
			$table->string('phone');
			$table->string('fax');
			$table->string('email');
			$table->text('content_sw');
			$table->string('content_translation')->nullable();
			$table->string('photo_url');
			$table->double('latitude');
			$table->double('longitude');
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
        Schema::dropIfExists('regional_offices');
	}

}
