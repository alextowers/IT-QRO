<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert(array(
            array('name' => 'finalizada', 'created_at' => date("Y-m-d H:i:s")),
            array('name' => 'cancelada', 'created_at' => date("Y-m-d H:i:s")),
            array('name' => 'facturada', 'created_at' => date("Y-m-d H:i:s"))
        ));
    }
}
