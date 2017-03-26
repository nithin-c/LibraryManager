<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class LibraryBookCategories5 extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('circulations', function ($table) {

			$table->dropColumn('fine_amount');

		});
		Schema::table('circulations', function ($table) {

			$table->integer('fine_amount')->nullable();
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
