<?php

use Faker\Generator as Faker;

$factory->define(App\Sale::class, function (Faker $faker) {
    return [
        'user_id' =>rand(1,11),
        'driver_id' => rand(1,10),
        'product_id' => rand(1,20),
        'cuantity'	=> $faker->numberBetween(200,1500),
        'unitary'		=> $faker->randomFloat(2,0,5000),
        'status'		=> $faker->randomElement(['PENDING','FINISHED']),
    ];
});
