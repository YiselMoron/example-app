<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_p_e', function (Blueprint $table) {
            $table->id();
            
            $table->integer('CantidadResivida');
            $table->string('Estado', 15);
            $table->date('FechaLlegada');

            $table->unsignedBigInteger('IdEquipo');
            $table->foreign('IdEquipo')->references('id')->on('equipo');

            $table->unsignedBigInteger('IdPedidoEquipo');
            $table->foreign('IdPedidoEquipo')->references('id')->on('pedidoequipo');

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
        Schema::dropIfExists('detalle_p_e');
    }
}
