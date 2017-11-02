<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesarrolloPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desarrollo_personal', function (Blueprint $table) {
            $table->increments('id_desarrollo_personal');
            $table->text('habilidad_personal')->nullable();
            $table->text('idomas_personal')->nullable();
            $table->text('otro_personal')->nullable();
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
        Schema::dropIfExists('desarrollo_personal');
    }
}
