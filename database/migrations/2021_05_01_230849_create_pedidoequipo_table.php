<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoequipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidoequipo', function (Blueprint $table) {
            $table->id();
            
            $table->integer('Cantidad');
            $table->date('FechaPedido');
            
            $table->unsignedBigInteger('IdPersona');
            $table->foreign('IdPersona')->references('id')->on('persona');

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
        Schema::dropIfExists('pedidoequipo');
    }
}
