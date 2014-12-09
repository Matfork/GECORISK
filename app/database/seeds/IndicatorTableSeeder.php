<?php

class IndicatorTableSeeder extends Seeder {

    public function run()
    {
        DB::table('indicators')->delete();

        $date = new \DateTime;
        DB::table('indicators')->insert(array(
        	array('min_indicator' => 0, 'max_indicator' => 40, 'color' => 'red','created_at' => $date, 'updated_at' => $date ),
        	array('min_indicator' => 41, 'max_indicator' => 90, 'color' => 'yellow','created_at' => $date, 'updated_at' => $date ),
        	array('min_indicator' => 91, 'max_indicator' => 100, 'color' => 'green','created_at' => $date, 'updated_at' => $date )        	
        ));
    }

}