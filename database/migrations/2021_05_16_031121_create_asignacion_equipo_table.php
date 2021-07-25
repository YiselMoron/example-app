<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacionEquipo', function (Blueprint $table) {
            $table->id();
            $table->string('serie')->nullable();
            $table->string('codigo')->nullable();
            $table->date('fechaEntrega');
            $table->unsignedBigInteger('idFormulario');
            $table->foreign('idFormulario')->references('id')->on('formularioEquipo');
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
        Schema::dropIfExists('asignacionEquipo');
    }
}
