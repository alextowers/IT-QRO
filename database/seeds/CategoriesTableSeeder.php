<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
            array('name' => 'laptops'),
            array('name' => 'monitores'),
            array('name' => 'accesorios'),
            array('name' => 'discos duros'),
            array('name' => 'memorias usb')
        ));
    }
}
