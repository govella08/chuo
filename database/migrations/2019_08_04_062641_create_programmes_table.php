<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_translation')->nullable();
            $table->text('description');
            $table->text('description_translation')->nullable();
            $table->integer('level_id')->unsigned()->index();
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->string('slugy')->index();
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
        Schema::dropIfExists('programmes');
    }
}
