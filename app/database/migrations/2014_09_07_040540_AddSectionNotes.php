<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSectionNotes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		Schema::create('notes', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('section_id')->unsigned();
			$table->foreign('section_id')
            ->references('id')->on('sections')
            ->onDelete('cascade')
            ->onUpdate('cascade');
			$table->string('notetitle', 150);
			$table->date('noteaddeddate');
			$table->longText('description')->nullable();
			$table->integer('rank')->nullable();
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
		Schema::drop('notes');
	}

}
