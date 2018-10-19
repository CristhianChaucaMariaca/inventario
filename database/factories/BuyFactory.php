<?php

use Faker\Generator as Faker;

$factory->define(App\Buy::class, function (Faker $faker) {
    return [
        'user_id' =>rand(1,11),
        'provider_id' => rand(1,50),
        'product_id' => rand(1,20),
        'cuantity'	=> $faker->numberBetween(200,1500),
        'unitary'		=> $faker->randomFloat(2,0,5000),
        'status'		=> $faker->randomElement(['PENDING','FINISHED']),

    ];
});
