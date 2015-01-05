<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsToTablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('risks', function(Blueprint $table)
		{
			$table->foreign('riskType_id')->references('riskType_id')->on('risk_types');
		});

		Schema::table('documents', function(Blueprint $table)
		{
			$table->foreign('solution_id')->references('solution_id')->on('solutions')->onDelete('cascade');
			$table->foreign('documentType_id')->references('documentType_id')->on('document_types');
		});

		Schema::table('risks_projects', function(Blueprint $table)
		{
			$table->foreign('risk_id')->references('risk_id')->on('risks')->onDelete('cascade');
			$table->foreign('project_id')->references('project_id')->on('projects')->onDelete('cascade');
		});

		Schema::table('solutions', function(Blueprint $table)
		{
			$table->foreign('risk_project_id')->references('risk_project_id')->on('risks_projects')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//We need to delete tables in the correct order of dependencies
		Schema::drop('documents');
		Schema::drop('solutions');
		Schema::drop('risks_projects');	
		Schema::drop('risks');
	}

}
