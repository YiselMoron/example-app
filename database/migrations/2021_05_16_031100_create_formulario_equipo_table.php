<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormularioEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularioEquipo', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->string('justificacion');
            $table->unsignedBigInteger('idSolicitud');
            $table->foreign('idSolicitud')->references('id')->on('solicitudEquipo');
            $table->unsignedBigInteger('idEquipo');
            $table->foreign('idEquipo')->references('id')->on('equipo');
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
        Schema::dropIfExists('formularioEquipo');
    }
}
