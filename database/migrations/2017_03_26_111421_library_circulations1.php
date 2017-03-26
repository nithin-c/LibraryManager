<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class LibraryCirculations1 extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('circulations', function ($table) {
			$table->increments('id');
			$table->integer('book_id');
			$table->integer('person_id');
			$table->date('issue_date');
			$table->date('due_date');
			$table->date('return_date');
			$table->integer('returned');
			$table->integer('fine_amount');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
	}
}
