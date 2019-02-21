<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(App\Device::class, function (Faker $faker) {
    return [
        'espname' => "",
        'password' => Hash::make("Smarthealper"),
        'deviceid' => ""
    ];
});
