<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableInfoTravel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infoTravel',function (Blueprint $table){
            $table->increments('id');
            $table->integer('idUsuario');
            $table->string('lat_inicio')->nullable();
            $table->string('lng_inicio')->nullable();
            $table->string('lat_final')->nullable();
            $table->string('lng_final')->nullable();
            $table->string('hora_inicio')->nullable();
            $table->string('hora_final')->nullable();
            $table->string('estado')->nullable();

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
        Schema::drop('infoTravel');
    }
}
