<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProviderTableSeeder::class);
        $this->call(BuyTableSeeder::class);
        $this->call(DriverTableSeeder::class);
        $this->call(SaleTableSeeder::class);
    }
}
