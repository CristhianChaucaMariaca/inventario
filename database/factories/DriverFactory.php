<?php

use Faker\Generator as Faker;

$factory->define(App\Driver::class, function (Faker $faker) {
    return [
    	'user_id'	=> rand(1,11),
        'name' 		=> $faker->firstName,
        'last_name' => $faker->lastName,
        'phone'		=> $faker->tollFreePhoneNumber,
        'address'	=> $faker->address,
        'ci'		=> $faker->numberBetween(99999,999999),
        'license'	=> $faker->numberBetween(99999,999999),
        'status'	=> $faker->randomElement(['FREE','OCCUPIED','OUT']),

    ];
});
