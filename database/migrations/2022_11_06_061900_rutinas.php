<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rutinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutinas', function (Blueprint $table) {
            $table->id();
            $table->string('fk_nivel');
            $table->string('fk_ejercicio');
            $table->string('fk_cuerpo');
            $table->string('fk_tipo');
            $table->bigInteger('series');
            $table->bigInteger('repetitions');
            $table->bigInteger('calorias');
            $table->bigInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutinas');
    }
}
