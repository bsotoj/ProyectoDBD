<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_usuario');
            $table->string('password');
            $table->integer('edad');
            $table->timestamp('updated_at');
            $table->unsignedBigInteger('id_cartera')->nullable();
            $table->foreign('id_cartera')->references('id')->on('wallets');
            $table->timestamp('created_at');
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
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('updated_at');
         });
    }
}
