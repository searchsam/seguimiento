<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class TipoEstudioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_estudio')->insert([
            [
                'tipo_estudio'   => 'Maestr&iacute;a',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'tipo_estudio'   => 'Posgrado',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'tipo_estudio'   => 'Especialidad',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'tipo_estudio'   => 'Licenciatura',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'tipo_estudio'   => 'Ingenier&iacute;a',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'tipo_estudio'   => 'T&eacute;nico',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'tipo_estudio'   => 'Bachiller',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'tipo_estudio'   => 'Otro',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ]
        ]);
    }
}
