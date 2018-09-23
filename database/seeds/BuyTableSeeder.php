<?php

use Illuminate\Database\Seeder;

class BuyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Buy::class, 200)->create();
    }
}
