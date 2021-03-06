<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exercises', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('template_id')->unsigned()->default(0);
			$table->foreign('template_id')->references('id')->on('templates')->onDelete('cascade');
			$table->string('name');
			$table->integer('sets');
			$table->integer('reps');
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
		Schema::drop('exercises');
	}
}
