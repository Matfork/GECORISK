<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingKeyToProjectIdOnProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('projects', function(Blueprint $table)
		{
		    $table->foreign('projectType_id')->references('projectType_id')->on('project_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('projects', function(Blueprint $table)
		{
		   DB::statement('ALTER TABLE projects DROP FOREIGN KEY projects_projecttype_id_foreign');

			//Schema::drop('projects_projecttype_id_foreign');
		});
	}

}
