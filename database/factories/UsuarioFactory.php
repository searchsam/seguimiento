<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\UsuarioFactory::class, function (Faker\Generator $faker) {
    static $password;
    $carbon = new \Carbon\Carbon();

    return [
        'nombre_usuario'    => $faker->name,
        'apellido_usuario'  => $faker->lastname,
        'email_usuario'     => $faker->unique()->safeEmail,
        'contrasena'        => $password ?: $password = bcrypt('secret'),
        'estado_usuario'    => 1,
        'fecha_registro'    => strtotime($carbon->now()),
        'foto_usuario'      => 'img/user.png',
        'tipo_usuario_id'   => 2,
    ];
});
