<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class FacultadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facultad')->insert([
            [
                'nombre_facultad'=> 'Facultad de Arquitectura',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_facultad'=> 'Facultad de Ciencias y Sistemas',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_facultad'=> 'Facultad de Electrotecnia y Computación',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_facultad'=> 'Facultad de Ingeniería Química',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_facultad'=> 'Facultad de Tecnología de la Construcción',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'nombre_facultad'=> 'Facultad de Tecnología de la Industria',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ]
        ]);
    }
}
