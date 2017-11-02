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
            $table->string('cuidad_laboral');
            $table->string('periodo_laboral');
            $table->integer('estudiante_id')->unsigned();
            $table->timestamps();

            $table->foreign('estudiante_id')->references('id_estudiante')->on('estudiante')->onDelete('cascade');
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
