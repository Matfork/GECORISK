<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solutions', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('solution_id');
			$table->integer('risk_project_id')->unsigned()->index();
			$table->text('description');
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
		/*Schema::table('solutions', function(Blueprint $table)
		{
			$table->dropForeign('solutions_risk_project_id_index');
		});*/

		//Schema::drop('solutions');
	}

}
