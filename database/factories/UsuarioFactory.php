<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Usuario::class, function (Faker\Generator $faker) {
    static $password;
    $carbon = new \Carbon\Carbon();

    $nombre     = $faker->name;
    $apellido   = $faker->lastname;
    $email      = $faker->unique()->safeEmail;

    DB::table('users')->insert([
        'name'           => $nombre,
        'lastname'       => $apellido,
        'email'          => $email,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'created_at'     => Carbon::now(),
        'updated_at'     => Carbon::now(),
    ]);

    return [
        'nombre_usuario'    => $nombre,
        'apellido_usuario'  => $apellido,
        'email_usuario'     => $email,
        'contrasena'        => $password ?: $password = bcrypt('secret'),
        'estado_usuario'    => 1,
        'fecha_registro'    => strtotime($carbon->now()),
        'foto_usuario'      => 'storage/usuario.svg',
        'tipo_usuario_id'   => 2,
    ];
});
