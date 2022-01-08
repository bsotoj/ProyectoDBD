<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('idGenero')->nullable();
            $table->foreign('idGenero')->references('id')->on('generos');
            $table->string('nombreJuego');
            $table->integer('edadRestriccion');
            $table->string('almacenamiento');
            $table->integer('capacidadJuego');
            $table->string('linkJuego');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juegos');
    }
}
