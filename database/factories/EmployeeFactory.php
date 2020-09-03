<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;


// php artisan tinker
// factory(\App\Employee::class, 10)->create();
$factory->define(Employee::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    static $number = 1;
    $department = $faker->randomElement(['1', '2', '3']);
    $designation = $faker->randomElement(['1', '2', '3']);

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'company_id' => $number++,
        'department_id' => $department,
        'designation_id' => $designation,
        'ipaddress_id' => '1',
        'bday' => now(),
        'personal_no' => '09292490219',
        'company_no' => '09121241435',
        'address' => $faker->address,
        'employee_no' => $faker->unique()->numberBetween(1,20),
        'gender' => $gender,
        'created_at' => now(),
        'updated_at' => now(),
        'cover_image' => 'noimage.jpg',
        'user_id' => $faker->unique()->numberBetween(1,20),
    ];
});