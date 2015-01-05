<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorValueAndIndicatorGroupToIndicators extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('indicators', function($table)
		{
		   $table->string('color_value');
		   $table->string('indicator_group');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('indicators', function($table)
		{
			$table->dropColumn('color_value');
			$table->dropColumn('indicator_group');
		});
	}

}
