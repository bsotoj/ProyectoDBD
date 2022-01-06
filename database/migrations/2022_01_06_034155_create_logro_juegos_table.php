<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogroJuegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logro_juegos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('idLogro')->nullable();
            $table->foreign('idLogro')->references('id')->on('logros');
            $table->unsignedBigInteger('idJuego')->nullable();
            $table->foreign('idJuego')->references('id')->on('juegos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logro_juegos');
    }
}
