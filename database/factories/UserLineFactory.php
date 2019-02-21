<?php

use Faker\Generator as Faker;

$factory->define(App\UserLine::class, function (Faker $faker) {
    return [
        'id' => '',
        'esp' => str_random(12)
    ];
});
