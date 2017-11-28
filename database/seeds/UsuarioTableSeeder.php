<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            [
                'nombre_usuario'    => 'Super',
                'apellido_usuario'  => 'Usuario',
                'email_usuario'     => 'root@mail.net',
                'contrasena'        => bcrypt('321321'),
                'estado_usuario'    => TRUE,
                'fecha_registro'    => strtotime(Carbon::now()),
                'foto_usuario'      => 'storage/admin.svg',
                'tipo_usuario_id'   => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'nombre_usuario'    => 'Admin',
                'apellido_usuario'  => 'istrador',
                'email_usuario'     => 'admin@mail.net',
                'contrasena'        => bcrypt('098098'),
                'estado_usuario'    => TRUE,
                'fecha_registro'    => strtotime(Carbon::now()),
                'foto_usuario'      => 'storage/usuario.svg',
                'tipo_usuario_id'   => 2,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'nombre_usuario'    => 'Jose',
                'apellido_usuario'  => 'Lopez',
                'email_usuario'     => 'jlopez@mail.net',
                'contrasena'        => bcrypt('098098'),
                'estado_usuario'    => TRUE,
                'fecha_registro'    => strtotime(Carbon::now()),
                'foto_usuario'      => 'storage/cliente.svg',
                'tipo_usuario_id'   => 3,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'nombre_usuario'    => 'Maria',
                'apellido_usuario'  => 'Perez',
                'email_usuario'     => 'mperez@mail.net',
                'contrasena'        => bcrypt('054321'),
                'estado_usuario'    => TRUE,
                'fecha_registro'    => strtotime(Carbon::now()),
                'foto_usuario'      => 'storage/cliente.svg',
                'tipo_usuario_id'   => 4,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ]);
    }
}
