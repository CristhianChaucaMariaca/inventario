<?php

use Faker\Generator as Faker;

$factory->define(App\Kardex::class, function (Faker $faker) {
    return [
        'user_id'	=> rand(1,11),
        'product_id'=> rand(1,20),
        'sale_id'	=> rand(1,50),
        'buy_id'	=> rand(1,200),
        'balance'	=> rand(500,2000),
        'value'		=> $faker->randomFloat(2,0,5000),
        'type'		=> $faker->randomElement(['INPUT','OUTPUT']),
    ];
});
