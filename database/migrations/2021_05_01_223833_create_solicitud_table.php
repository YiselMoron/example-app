<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->id();
            $table->string('Problema', 200);
            $table->string('Solucion', 200)->nullabel();
            $table->time('TiempoSolucion');
            $table->time('HoraInicio');
            $table->time('HoraFina');

            $table->unsignedBigInteger('IdPersona');
            $table->foreign('IdPersona')->references('id')->on('persona');

            $table->unsignedBigInteger('IdTipoSolicitud');
            $table->foreign('IdTipoSolicitud')->references('id')->on('tiposolicitud');
            

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
        Schema::dropIfExists('solicitud');
    }
}
