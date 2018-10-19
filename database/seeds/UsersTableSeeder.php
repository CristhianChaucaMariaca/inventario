<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

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
        Role::create([
            'name'      =>'Admin',
            'slug'      =>'admin',
            'special'   =>'all-access',
        ]);
    }
}
