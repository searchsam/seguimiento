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
            'nombre_usuario'    => 'admin',
            'apellido_usuario'    => 'istrador',
            'email_usuario'     => 'admin@mail.net',
            'contrasena'        => bcrypt('321321'),
            'estado_usuario'    => TRUE,
            'fecha_registro'    => strtotime(Carbon::now()),
            'foto_usuario'      => 'img/user.png',
            'tipo_usuario_id'   => 1,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
    }
}
