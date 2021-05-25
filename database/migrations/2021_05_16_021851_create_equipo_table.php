<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('Stock');
            $table->unsignedBigInteger('idMarca');
            $table->foreign('idMarca')->references('id')->on('marca');
            $table->unsignedBigInteger('idTipoEquipo');

            $table->foreign('idTipoEquipo')->references('id')->on('tipoEquipo');
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
        Schema::dropIfExists('equipo');
    }
}
