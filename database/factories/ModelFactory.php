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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Usuario::class, function (Faker\Generator $faker) {
    static $password;
    $carbon = new \Carbon\Carbon();

    return [
        'nombre_usuario'    => $faker->name,
        'email_usuario'     => $faker->unique()->safeEmail,
        'contrasena'        => $password ?: $password = bcrypt('secret'),
        'estado_usuario'    => 1,
        'fecha_registro'    => strtotime($carbon->now()),
        'foto_usuario'      => 'img/user.png',
        'tipo_usuario_id'   => 2,
    ];
});
