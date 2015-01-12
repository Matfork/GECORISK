<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicatorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('indicators', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('indicator_id');
			$table->decimal('min_indicator');
			$table->decimal('max_indicator');
			$table->string('color',30);
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
		Schema::drop('indicators');
	}

}
