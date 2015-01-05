<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeImpactProbabilityToIntInRisksProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('ALTER TABLE risks_projects MODIFY COLUMN probability int');
		DB::statement('ALTER TABLE risks_projects MODIFY COLUMN impact int');

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('ALTER TABLE risks_projects MODIFY COLUMN probability decimal');
		DB::statement('ALTER TABLE risks_projects MODIFY COLUMN impact decimal');
	}

}
