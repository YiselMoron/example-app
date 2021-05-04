<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimiendo', function (Blueprint $table) {
            $table->id();
            $table->date('FechaIngreso');
            $table->date('FechaEntrega')->nullable();

            $table->unsignedBigInteger('IdDetallePersonaEquipo');
            $table->foreign('IdDetallePersonaEquipo')->references('id')->on('detalle_persona_equipo');

            $table->unsignedBigInteger('IdSolicitud');
            $table->foreign('IdSolicitud')->references('id')->on('solicitud');

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
        Schema::dropIfExists('mantenimiendo');
    }
}
