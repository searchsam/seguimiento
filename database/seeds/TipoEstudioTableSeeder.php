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
                'tipo_estudio'   => 'Posgrado',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'tipo_estudio'   => 'Tecnico',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'tipo_estudio'   => 'Certificacion',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ]
        ]);
    }
}
