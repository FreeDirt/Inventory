<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Device;
use Faker\Generator as Faker;


// php artisan tinker
// factory(\App\Device::class, 10)->create();
$factory->define(Device::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    static $number = 1;
    $random = $faker->randomElement(['1', '2', '3']);
    $designation = $faker->randomElement(['1', '2', '3']);

    return [
        'deviceCode' => $random,
        'brand_id' => $random,
        'category_id' => $random,
        'user_id' => '3',
        'country_id' => '1',
        'name' => $faker->name,
        'model_no' => 'A45wa',
        'model_year' => $faker->year($max = 'now') ,
        'cost' => $faker->randomNumber(2),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});