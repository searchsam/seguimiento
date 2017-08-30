<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta', function (Blueprint $table) {
            $table->increments('id_oferta');
            $table->integer('fecha_registro_oferta');
            $table->boolean('estado_oferta');
            $table->integer('fecha_limite_oferta')->nullable();
            $table->string('descripcion_oferta');
            $table->integer('empresa_id')->unsigned();
            $table->integer('detalle_oferta_id')->unsigned();
            $table->integer('tipo_oferta_id')->unsigned();
            $table->timestamps();

            $table->primary('id_oferta');
            $table->foreign('empresa_id')->references('id_empresa')->on('empresa')->onDelete('cascade');
            $table->foreign('detalle_oferta_id')->references('id_detalle_oferta')->on('detalle_oferta')->onDelete('cascade');
            $table->foreign('tipo_oferta_id')->references('id_tipo_oferta')->on('tipo_oferta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oferta');
    }
}
