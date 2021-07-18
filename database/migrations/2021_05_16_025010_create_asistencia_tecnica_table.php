<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciaTecnicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistenciaTecnica', function (Blueprint $table) {
            $table->id();
            $table->string('problema');
            $table->string('solucion')->nullable();
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
        Schema::dropIfExists('asistenciaTecnica');
    }
}
