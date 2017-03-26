<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class LibraryAuthor3 extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('authors', function ($table) {

			$table->dropColumn('deleted_at');
		});
		Schema::table('authors', function ($table) {

			$table->dateTime('deleted_at')->nullable();
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
