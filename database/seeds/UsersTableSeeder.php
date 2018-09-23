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
        factory(App\User::class,10)->create();

        App\User::create([
        	'name'=>'Cristhian',
        	'email'=>'cristhian@gmail.com',
        	'password'=>bcrypt('123'),
        ]);
    }
}
