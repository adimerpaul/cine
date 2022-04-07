<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funciones', function (Blueprint $table) {
            $table->id();
            $table->boolean("sub");
            $table->boolean("traducida");
            $table->string("tipo");
            $table->date("fecha");
            $table->time("hora");
            $table->double("precio",11,2);
            $table->unsignedBigInteger("pelicula_id");
            $table->foreign("pelicula_id")->references('id')->on('peliculas');
            $table->unsignedBigInteger("sala_id");
            $table->foreign("sala_id")->references('id')->on('salas');
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
        Schema::dropIfExists('funciones');
    }
};
