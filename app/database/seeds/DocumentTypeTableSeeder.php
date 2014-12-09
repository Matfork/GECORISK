<?php

class DocumentTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('document_types')->delete();

        $date = new \DateTime;
        DB::table('document_types')->insert(array(
        	array('name' => 'mitigation plan','created_at' => $date, 'updated_at' => $date ),
            array('name' => 'contingency plan','created_at' => $date, 'updated_at' => $date ),
            array('name' => 'lesson learned','created_at' => $date, 'updated_at' => $date ),
            array('name' => 'others','created_at' => $date, 'updated_at' => $date )
        ));
    }

}