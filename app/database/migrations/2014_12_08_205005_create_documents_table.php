<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documents', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('document_id');
			$table->integer('solution_id')->unsigned()->index();
			$table->string('pathFile',200);
			$table->string('nameFile',100);
			$table->integer('documentType_id')->unsigned();
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
		//Schema::drop('documents');
	}

}
