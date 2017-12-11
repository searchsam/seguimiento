<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion', function (Blueprint $table) {
            $table->increments('id_asignacion');
            $table->integer('oferta_id')->unsigned();
            $table->integer('estudiante_id')->unsigned();
            $table->boolean('aplica')->default(0);
            $table->timestamps();

            $table->foreign('oferta_id')->references('id_oferta')->on('oferta')->onDelete('cascade');
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
        Schema::dropIfExists('asignacion');
    }
}
