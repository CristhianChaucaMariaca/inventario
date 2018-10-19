<?php

use Faker\Generator as Faker;

$factory->define(App\In::class, function (Faker $faker) {
    return [
        'kardex_id' =>rand(1,50),
        'cuantity' => rand(20,500),
        'value'	=> rand(500,5000),
    ];
});
