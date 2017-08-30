<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_estudiante', function (Blueprint $table) {
            $table->increments('id_tipo_estudiante');
            $table->string('tipo_estudiante')->nullable();
            $table->timestamps();

            $table->primary('id_tipo_estudiante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_estudiante');
    }
}
