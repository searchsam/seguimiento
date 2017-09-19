<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class TipoEstudianteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_estudiante')->insert([
            [
                'tipo_estudiante'=> 'Activo',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'tipo_estudiante'=> 'Egresado',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'tipo_estudiante'=> 'Graduado',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ]
        ]);
    }
}
