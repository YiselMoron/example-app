<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePersonaEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_persona_equipo', function (Blueprint $table) {
            $table->id();
            $table->string('CodigoEquipo', 100);
            $table->integer('Serie');

            $table->unsignedBigInteger('IdPersona');
            $table->foreign('IdPersona')->references('id')->on('persona');

            $table->unsignedBigInteger('IdEquipo');
            $table->foreign('IdEquipo')->references('id')->on('equipo');



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
        Schema::dropIfExists('detalle_persona_equipo');
    }
}
