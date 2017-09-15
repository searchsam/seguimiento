<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PrivilegioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privilegio')->insert([
            [
                'privilegio' => 'crud',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'privilegio' => 'cru',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'privilegio' => 'ru',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]
        ]);
    }
}
