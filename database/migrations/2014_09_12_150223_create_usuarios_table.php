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

            $table->string('nombre_usuario');
            $table->string('password');
            $table->integer('edad');

            $table->unsignedBigInteger('id_cartera')->nullable();
            $table->foreign('id_cartera')->references('id')->on('wallets');
            $table->unsignedBigInteger('código_postal')->nullable();
            $table->foreign('código_postal')->references('id')->on('geozones');

            $table->unsignedBigInteger('id_lista_deseo')->nullable();
            $table->foreign('id_lista_deseo')->references('id')->on('wish_lists');


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
