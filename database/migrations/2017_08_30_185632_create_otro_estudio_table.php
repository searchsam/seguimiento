<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtroEstudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otro_estudio', function (Blueprint $table) {
            $table->increments('id_otro_estudio');
            $table->string('nombre_estudio');
            $table->string('institucion');
            $table->string('fecha_estudio');
            $table->integer('tipo_estudio_id')->unsigned();
            $table->timestamps();

            $table->primary('id_otro_estudio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otro_estudio');
    }
}
