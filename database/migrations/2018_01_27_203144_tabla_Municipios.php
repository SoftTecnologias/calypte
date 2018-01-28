<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaMunicipios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MUNICIPIOS',function (Blueprint $table){
            $table->increments('id');
            $table->integer('ESTADOID');
            $table->string('DESC');

            $table->foreign('ESTADOID')->references('id')->on('ESTADOS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('MUNICIPIOS');
    }
}
