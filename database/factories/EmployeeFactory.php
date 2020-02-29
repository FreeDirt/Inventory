<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'employee_no' => $faker->unique()->randomDigit,
        'gender' => $gender,
        'created_at' => now(),
        'updated_at' => now(),
        'cover_image' => 'noimage.jpg',
        'user_id' => $faker->unique()->randomDigit,
    ];
});
