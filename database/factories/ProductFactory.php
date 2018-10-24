<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
    	'type_id' => rand(1,5),
        'name'=>$faker->unique()->word(7),
        'min' => rand(300,1000),
        'status'=>$faker->randomElement(['PUBLIC','PRIVATE']),
    ];
});
