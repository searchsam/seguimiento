<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto', function (Blueprint $table) {
            $table->increments('id_contacto');
            $table->string('nombre_contacto');
            $table->string('apellido_contacto');
            $table->string('cedula_contacto');
            $table->string('cargo_contacto');
            $table->string('email_contacto');
            $table->string('telefono_institucional');
            $table->integer('empresa_id')->unsigned();
            $table->timestamps();

            $table->foreign('empresa_id')->references('id_empresa')->on('empresa')->onDelite('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacto');
    }
}
