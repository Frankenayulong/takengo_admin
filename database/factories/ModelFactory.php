<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => 'Kendrick',
        'last_name' => 'Kesley',
        'email' => 'kendrick@takengo.io',
        'password' => $password ?: $password = bcrypt('kendricktakengo'),
        'remember_token' => str_random(10),
        'status' => json_encode([
            'active' => true
        ]),
        'last_ip' => $faker->ipv4()
    ];
});
