<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRisksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('risks', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('risk_id');
			$table->string("name", 80);
            $table->text("description");
            $table->integer('riskType_id')->unsigned()->index();
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
		//Schema::drop('risks');
	}

}
