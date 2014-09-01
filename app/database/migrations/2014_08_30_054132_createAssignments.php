<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		Schema::create('assignments', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('user_id')->unsigned();
			$table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('course_id')->unsigned();
			$table->foreign('course_id')
            ->references('id')->on('courses')
            ->onDelete('cascade')
            ->onUpdate('cascade');
			$table->string('assignmentname', 100);
			$table->date('assigndate');
			$table->date('duedate');
			$table->longText('description')->nullable();
			$table->longText('materials')->nullable();
			$table->longText('notes')->nullable();
			$table->string('externalURL')->nullable();
			$table->boolean('completed')->default(0);
			$table->date('completeddate')->nullable();
			$table->boolean('turnedin')->default(0);
			$table->date('turnedindate')->nullable();
			$table->integer('grade')->nullable();
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
		//
		Schema::drop('assignments');
	}

}
