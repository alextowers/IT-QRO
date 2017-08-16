<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array(
                'name' => 'Alejandro Torres',
                'email' => 'alex910121@gmail.com',
                'password' => bcrypt('password')
            )
        ));
    }
}
