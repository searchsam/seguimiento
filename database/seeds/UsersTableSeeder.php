<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'           => 'Super',
                'lastname'       => 'Usuario',
                'email'          => 'root@mail.net',
                'password'       => bcrypt('321321'),
                'remember_token' => str_random(10),
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'name'           => 'Admin',
                'lastname'       => 'istrador',
                'email'          => 'admin@mail.net',
                'password'       => bcrypt('098098'),
                'remember_token' => str_random(10),
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'name'           => 'Jose',
                'lastname'       => 'Lopez',
                'email'          => 'jlopez@mail.net',
                'password'       => bcrypt('098098'),
                'remember_token' => str_random(10),
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'name'           => 'Maria',
                'lastname'       => 'Perez',
                'email'          => 'mperez@mail.net',
                'password'       => bcrypt('054321'),
                'remember_token' => str_random(10),
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
        ]);
    }
}
