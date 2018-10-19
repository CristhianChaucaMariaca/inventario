<?php

use Faker\Generator as Faker;

$factory->define(App\Provider::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->streetAddress,
        'phone' => $faker->numberBetween(999999,9999999),
    ];
});
