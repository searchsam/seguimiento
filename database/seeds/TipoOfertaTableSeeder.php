<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class TipoOfertaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_oferta')->insert([
            [
                'tipo_oferta'   => 'Pasantia',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'tipo_oferta'   => 'Laboral',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ]
        ]);
    }
}
