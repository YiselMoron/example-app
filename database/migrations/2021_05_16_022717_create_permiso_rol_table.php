<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisoRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisoRol', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idRol');
            $table->foreign('idRol')->references('id')->on('rol');
            $table->unsignedBigInteger('idOperacion');
            $table->foreign('idOperacion')->references('id')->on('operacion');
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
        Schema::dropIfExists('permisoRol');
    }
}
