<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert(array(
            array('name' => 'Cimatario', 'address' => 'Av. Cimatario #346'),
            array('name' => 'Lomas Del Marques', 'address' => 'Marques de Montes Claros #34'),
            array('name' => 'Satelite', 'address' => 'Av. De la Luz #445'),
            array('name' => 'Juriquilla', 'address' => 'Av. Paseo de la Republica #600'),
            array('name' => 'Alamos', 'address' => 'Industrializacion #3'),
        ));
    }
}
