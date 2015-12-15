<?php

use Illuminate\Database\Migrations\Migration;

class AlterSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('settings', function ($table) {
			$table->renameColumn('key', 'setting_key');
			$table->renameColumn('value', 'setting_value');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('settings', function ($table) {
			$table->renameColumn('setting_key', 'key');
			$table->renameColumn('setting_value', 'value');
		});
	}

}
