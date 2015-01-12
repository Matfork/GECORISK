<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRisksProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('risks_projects', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('risk_project_id');
			$table->integer('risk_id')->unsigned()->index();
			$table->integer('project_id')->unsigned()->index();
			$table->text('description');
			$table->decimal('probability');
			$table->decimal('impact');
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
		//Schema::drop('risks_projects');
	}

}
