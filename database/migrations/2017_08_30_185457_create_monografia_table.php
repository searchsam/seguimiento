<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonografiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monografia', function (Blueprint $table) {
            $table->increments('id_monografia');
            $table->string('titulo_monografia');
            $table->string('tutor_monografia');
            $table->string('fecha_monografia');
            $table->string('objetivo_general');
            $table->text('descripcion_monografia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monografia');
    }
}
