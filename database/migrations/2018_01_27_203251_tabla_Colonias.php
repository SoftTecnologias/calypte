<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaColonias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('COLONIAS',function (Blueprint $table){
            $table->increments('id');
            $table->integer('MUNICIPIOID');
            $table->string('DESC');

            $table->foreign('MUNICIPIOID')->references('id')->on('MUNICIPIOS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('COLONIAS');
    }
}
