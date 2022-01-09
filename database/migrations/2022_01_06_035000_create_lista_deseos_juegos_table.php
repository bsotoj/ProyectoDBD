<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaDeseosJuegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_deseos_juegos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
           

            $table->unsignedBigInteger('idListaDeseo')->nullable();
            $table->foreign('idListaDeseo')->references('id')->on('lista_deseos');

            $table->unsignedBigInteger('idJuego')->nullable();
            $table->foreign('idJuego')->references('id')->on('juegos');
            $table->boolean('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_deseos_juegos');
    }
}
