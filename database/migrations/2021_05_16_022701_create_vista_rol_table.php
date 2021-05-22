<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVistaRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vistaRol', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idRol');
            $table->foreign('idRol')->references('id')->on('rol');
            $table->unsignedBigInteger('idVista');
            $table->foreign('idVista')->references('id')->on('vista');
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
        Schema::dropIfExists('vistaRol');
    }
}
