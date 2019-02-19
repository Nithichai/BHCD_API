<?php

use Faker\Generator as Faker;

$factory->define(App\UserInfo::class, function (Faker $faker) {
    return [
        'id' => str_random(33),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->email,
        'career' => $faker->jobTitle,
        'birthday' => $faker->dateTime
    ];
});
