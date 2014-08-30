<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialStructure extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{


		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname', 30);
			$table->string('lastname', 30);
			$table->string('username', 64);
			$table->string('password', 64);
			$table->string('email', 128)->nullable();
			$table->string('phone', 25)->nullable();
			$table->boolean('active')->default(1);
			$table->string('remember_token', 100)->nullable();

			$table->timestamps();
		});

		Schema::create('courses', function(Blueprint $table) {
			$table->increments('id');
			$table->string('coursename', 100);
			$table->integer('periodnum')->nullable();
			$table->longText('description')->nullable();
			$table->string('websiteURL', 160)->nullable();
			$table->timestamps();
		});


		Schema::create('course_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('course_id')->unsigned();
			$table->integer('rank')->default(0);
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('course_id')->references('id')->on('courses');
		});


		Schema::create('coursetypes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('coursetype');
			$table->longText('description');
			$table->timestamps();
		});

		Schema::create('course_coursetype', function(Blueprint $table)
		{

			$table->increments('id');
			$table->integer('course_id')->unsigned();
			$table->integer('coursetype_id')->unsigned();
			$table->integer('rank')->default(0);
			$table->foreign('course_id')->references('id')->on('courses');
			$table->foreign('coursetype_id')->references('id')->on('coursetypes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('course_user');
		Schema::drop('course_coursetype');
		Schema::drop('users');
		Schema::drop('courses');
		Schema::drop('coursetypes');
	}

}