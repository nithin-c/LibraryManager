<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class LibraryBookCategories4 extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('circulations', function ($table) {

			$table->dropColumn('return_date');
			$table->dropColumn('returned');
		});
		Schema::table('circulations', function ($table) {

			$table->dateTime('return_date')->nullable();
			$table->integer('return')->nullable();
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
