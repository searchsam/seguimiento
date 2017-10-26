<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatoProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dato_profesional', function (Blueprint $table) {
            $table->increments('id_dato_profesional');
            $table->string('especializacion')->nullable();
            $table->string('grado_especializacion')->nullable();
            $table->boolean('situacion_laraboral')->nullable() ;
            $table->integer('monografia_id')->unsigned()->nullable($value = true);
            $table->integer('experiencia_laboral_id')->unsigned();
            $table->integer('otro_estudio_id')->unsigned();
            $table->integer('facultad_id')->unsigned()->nullable($value = true);
            $table->timestamps();

            $table->foreign('monografia_id')->references('id_monografia')->on('monografia')->onDelete('cascade');
            $table->foreign('experiencia_laboral_id')->references('id_experiencia_laboral')->on('experiencia_laboral')->onDelete('cascade');
            $table->foreign('otro_estudio_id')->references('id_otro_estudio')->on('otro_estudio')->onDelete('cascade');
            $table->foreign('facultad_id')->references('id_facultad')->on('facultad')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dato_profesional');
    }
}
