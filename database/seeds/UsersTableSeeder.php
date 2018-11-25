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
        	'name'=>'admin',
        	'email'=>'admin@admin.com',
        	'password'=>bcrypt('admin'),
        ]);
        Role::create([
            'name'      =>'Admin',
            'slug'      =>'admin',
            'special'   =>'all-access',
        ]);
    }
}
