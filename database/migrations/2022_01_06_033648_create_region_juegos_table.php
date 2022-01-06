<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionJuegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_juegos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->integer('precio');
            $table->string('moneda');
            $table->unsignedBigInteger('idRegion')->nullable();
            $table->foreign('idRegion')->references('id')->on('regions');
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
        Schema::dropIfExists('region_juegos');
    }
}
