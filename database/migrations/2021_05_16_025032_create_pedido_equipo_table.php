<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidoEquipo', function (Blueprint $table) {
            $table->id();
            $table->date('fechaPedido');
            $table->integer('numeroAlmacen');
            $table->unsignedBigInteger('idPersona');
            $table->foreign('idPersona')->references('id')->on('persona');
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
        Schema::dropIfExists('pedidoEquipo');
    }
}
