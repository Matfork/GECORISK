<?php

class IndicatorTableSeeder extends Seeder {

    public function run()
    {
        DB::table('indicators')->delete();

        $date = new \DateTime;
        DB::table('indicators')->insert(array(
        	array('min_indicator' => 0, 'max_indicator' => 40,  'color' => 'Green', 'color_value' =>'success','indicator_group'  => 'frecuency_semaphore', 'created_at' => $date, 'updated_at' => $date ),
        	array('min_indicator' => 41, 'max_indicator' => 85, 'color' => 'Yellow', 'color_value' =>'warning', 'indicator_group'  => 'frecuency_semaphore', 'created_at' => $date, 'updated_at' => $date ),
        	array('min_indicator' => 86, 'max_indicator' => 100, 'color' => 'Red', 'color_value' =>'danger', 'indicator_group'  => 'frecuency_semaphore','created_at' => $date, 'updated_at' => $date ),
            array('min_indicator' => 0, 'max_indicator' => 9, 'color' => 'Green', 'color_value' =>'success', 'indicator_group'  => 'risk_level','created_at' => $date, 'updated_at' => $date ),
            array('min_indicator' => 10, 'max_indicator' => 19, 'color' => 'Yellow', 'color_value' =>'warning', 'indicator_group'  => 'risk_level','created_at' => $date, 'updated_at' => $date ),         
            array('min_indicator' => 20, 'max_indicator' => 25, 'color' => 'Red', 'color_value' =>'danger', 'indicator_group'  => 'risk_level','created_at' => $date, 'updated_at' => $date )         
                	
        ));
    }

}