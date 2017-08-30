<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciaLaboralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencia_laboral', function (Blueprint $table) {
            $table->increments('id_experiencia_laboral');
            $table->string('institucion_laboral');
            $table->string('cargo_laboral');
            $table->integer('fecha_inicio_laboral');
            $table->integer('fecha_fin_laboral');
            $table->timestamps();

            $table->primary('id_experiencia_laboral');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiencia_laboral');
    }
}
