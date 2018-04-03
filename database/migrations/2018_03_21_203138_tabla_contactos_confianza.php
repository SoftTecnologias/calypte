<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaContactosConfianza extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CONTACTOS_CONFIANZA',function (Blueprint $table){
            $table->integer('idUsuario');
            $table->string('TELEFONO');

            $table->foreign('idUsuario')->references('id')->on('USERS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CONTACTOS_CONFIANZA');
    }
}
