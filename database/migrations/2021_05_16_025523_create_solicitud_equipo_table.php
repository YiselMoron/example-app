<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudEquipo', function (Blueprint $table) {
            $table->id();
            $table->date('fechaSolicitud');
            $table->boolean('estado');
            $table->unsignedBigInteger('idPersona');
            $table->foreign('idPersona')->references('id')->on('persona');
            $table->unsignedBigInteger('idSoporte')->nullable();
            $table->foreign('idSoporte')->references('id')->on('persona');
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
        Schema::dropIfExists('solicitudEquipo');
    }
}
