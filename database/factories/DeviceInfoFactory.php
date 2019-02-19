<?php

use Faker\Generator as Faker;

$factory->define(App\DeviceInfomation::class, function (Faker $faker) {
    return [
        'device_id' => "",
        'name' => $faker->firstName,
        'sex' => $faker->lastName,
        'height' => rand(140, 250),
        'weight' => rand(30, 200),
        'disease' => '',
        'phone' => $faker->e164PhoneNumber,
        'birthday' => $faker->dateTime
    ];
});
