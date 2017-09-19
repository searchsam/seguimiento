<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class TipoUsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuario')->insert([
            [
                'tipo_usuario'  => 'Administrador',
                'privilegio_id' => '1',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'tipo_usuario' => 'Usuario',
                'privilegio_id' => '2',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'tipo_usuario' => 'Estudiante',
                'privilegio_id' => '3',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'tipo_usuario' => 'Empresa',
                'privilegio_id' => '3',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]
        ]);
    }
}
