<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->increments('id_estudiante');
            $table->string('codigo_estudiante');
            $table->string('curriculum')->nullable();
            $table->string('nombre_estudiante');
            $table->string('apellido_estudiante');
            $table->string('cedula_estudiante')->unique();
            $table->string('celular_estudiante');
            $table->string('telefono_estudiante');
            $table->string('direccion_estudiante');
            $table->string('ciudad_estudiante');
            $table->string('email_estudiante');
            $table->boolean('sexo_estudiante');
            $table->integer('tipo_estudiante_id')->unsigned()->default('1');
            $table->integer('usuario_id')->unsigned();
            $table->timestamps();

            $table->foreign('tipo_estudiante_id')->references('id_tipo_estudiante')->on('tipo_estudiante')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id_usuario')->on('usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiante');
    }
}
