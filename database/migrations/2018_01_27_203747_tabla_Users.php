<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('USERS',function (Blueprint $table){
            $table->increments('id');
            $table->string('NOMBRE');
            $table->string('APE_PAT');
            $table->string('APE_MAT');
            $table->integer('ESTADOID');
            $table->integer('MUNICIPIOID');
            $table->integer('COLONIAID');
            $table->string('CALLE');
            $table->string('NUMERO');
            $table->integer('CP');
            $table->string('EMAIL')->unique();
            $table->string('TELEFONO_CEL')->nullable();
            $table->string('TELEFONO_FIJO')->nullable();
            $table->string('FECHA_NAC');
            $table->string('USUARIO')->unique();
            $table->string('PASSWORD');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('USERS');
    }
}
