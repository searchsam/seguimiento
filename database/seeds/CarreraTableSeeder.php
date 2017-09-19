<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class CarreraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carrera')->insert([
            [
                'nombre_carrera' => 'Arquitectura',
                'facultad_id'    => '1',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_carrera' => 'Ingenier&iacute;a en Sistemas',
                'facultad_id'    => '2',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_carrera' => 'Ingenier&iacute;a El&eacute;ctrica',
                'facultad_id'    => '3',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_carrera' => 'Ingenier&iacute;a Electr&oacute;nica',
                'facultad_id'    => '3',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_carrera' => 'Ingenier&iacute;a en Computaci&oacute;n',
                'facultad_id'    => '3',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_carrera' => 'Ingenier&iacute;a en Gesti&oacute;n Telecomunicaciones y Tecnolog&iacute;as de la Informaci&oacute;n',
                'facultad_id'    => '3',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_carrera' => 'Ingenier&iacute;a Qu&iacute;mica',
                'facultad_id'    => '4',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_carrera' => 'Ingenier&iacute;a Agr&iacute;cola',
                'facultad_id'    => '5',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_carrera' => 'Ingenier&iacute;a Civil',
                'facultad_id'    => '5',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_carrera' => 'Ingenier&iacute;a Industrial',
                'facultad_id'    => '6',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_carrera' => 'Ingenier&iacute;a Mec&aacute;nica',
                'facultad_id'    => '6',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ]
        ]);
    }
}
