<?php

use Illuminate\Database\Seeder;

class KardexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Kardex::class, 50)->create();
    }
}
