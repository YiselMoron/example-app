<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudAlmacen', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidadPedido');
            $table->integer('cantidadRecibido');
            $table->date('fechaPedido');
            $table->date('fechaRecibido');
            $table->string('descripcion');
            $table->boolean('estado');
            $table->unsignedBigInteger('idPedidoEquipo');
            $table->foreign('idPedidoEquipo')->references('id')->on('pedidoEquipo');
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
        Schema::dropIfExists('solicitudAlmacen');
    }
}
