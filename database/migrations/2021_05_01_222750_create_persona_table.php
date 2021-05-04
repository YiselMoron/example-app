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
            $table->string('NombreCompleto', 100);
            $table->integer('Celular');

            $table->unsignedBigInteger('IdCargo');
            $table->foreign('IdCargo')->references('id')->on('cargo');

            $table->unsignedBigInteger('IdDepartamento');
            $table->foreign('IdDepartamento')->references('id')->on('departamento');
            
            $table->unsignedBigInteger('IdUser');
            $table->foreign('IdUser')->references('id')->on('users');
            
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
