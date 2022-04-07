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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->boolean("estreno");
            $table->string("titulo");
            $table->string("imagen");
            $table->string("trailer");
            $table->string("clasificacion");
            $table->integer("tiempo");
            $table->integer("estrellas");
            $table->string("director");
            $table->string("reparto");
            $table->text("sinopsis");
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
        Schema::dropIfExists('peliculas');
    }
};
