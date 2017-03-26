<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class LibraryBooks1 extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('books', function ($table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('isbn', 100);
			$table->integer('author_id');
			$table->integer('publisher_id');
			$table->integer('count')->default(1);
			$table->timestamps();
			$table->dateTime('deleted_at');
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
