<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PrivilegioTableSeeder::class);
        $this->call(TipoUsuarioTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(FacultadTableSeeder::class);
        $this->call(CarreraTableSeeder::class);
        $this->call(TipoEstudianteTableSeeder::class);
        $this->call(TipoEstudioTableSeeder::class);
        $this->call(TipoOfertaTableSeeder::class);
    }
}
