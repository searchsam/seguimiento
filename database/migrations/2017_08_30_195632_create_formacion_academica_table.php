<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormacionAcademicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacion_academica', function (Blueprint $table) {
            $table->increments('id_formacion_academica');
            $table->string('nombre_estudio');
            $table->string('institucion_estudio');
            $table->string('localidad_estudio');
            $table->string('fecha_estudio');
            $table->integer('tipo_estudio_id')->unsigned();
            $table->integer('estudiante_id')->unsigned();
            $table->timestamps();

            $table->foreign('tipo_estudio_id')->references('id_tipo_estudio')->on('tipo_estudio')->onDelete('cascade');
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
        Schema::dropIfExists('formacion_academica');
    }
}
