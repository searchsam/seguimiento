<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReconocimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reconocimiento', function (Blueprint $table) {
            $table->increments('id_reconocimiento');
            $table->string('merito_reconocimiento');
            $table->string('organizacion_reconocimiento');
            $table->string('ciudad_reconocimiento');
            $table->string('fecha_reconocimiento');
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
        Schema::dropIfExists('reconocimiento');
    }
}
