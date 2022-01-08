<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombreUsuario');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('contraseña');
            $table->date('fechaNacimiento');
            $table->boolean('delete');


            $table->unsignedBigInteger('idCartera')->nullable();
            $table->foreign('idCartera')->references('id')->on('carteras');

            $table->unsignedBigInteger('idRegion')->nullable();
            $table->foreign('idRegion')->references('id')->on('regions');

            $table->unsignedBigInteger('idListaDeseos')->nullable();
            $table->foreign('idListaDeseos')->references('id')->on('lista_deseos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
