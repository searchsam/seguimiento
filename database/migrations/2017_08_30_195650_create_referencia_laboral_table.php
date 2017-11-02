<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenciaLaboralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_laboral', function (Blueprint $table) {
            $table->increments('id_referencia_laboral');
            $table->string('nombre_referencia');
            $table->string('cargo_referencia');
            $table->string('telefono_referencia');
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
        Schema::dropIfExists('referencia_laboral');
    }
}
