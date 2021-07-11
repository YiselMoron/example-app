<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCompleto');
            $table->integer('celular');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idCargo');
            $table->unsignedBigInteger('idDepartamento');
            $table->foreign('idDepartamento')->references('id')->on('departamento');
            $table->foreign('idCargo')->references('id')->on('cargo');
            $table->foreign('idUser')->references('id')->on('users');
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
        Schema::dropIfExists('persona');
    }
}
