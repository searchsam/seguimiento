<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatoProfecionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dato_profecional', function (Blueprint $table) {
            $table->increments('id_dato_profecional');
            $table->string('especializacion');
            $table->string('grado_especializacion');
            $table->boolean('situacion_laraboral');
            $table->integer('monografia_id')->unsigned();
            $table->integer('experiencia_laboral_id')->unsigned();
            $table->integer('otro_estudio_id')->unsigned();
            $table->integer('facultad_id')->unsigned();
            $table->timestamps();

            $table->foreign('monografia_id')->references('id_monografia')->on('monografia');
            $table->foreign('experiencia_laboral_id')->references('id_experiencia_laboral')->on('experiencia_laboral');
            $table->foreign('otro_estudio_id')->references('id_otro_estudio')->on('otro_estudio');
            $table->foreign('facultad_id')->references('id_facultad')->on('facultad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dato_profecional');
    }
}
