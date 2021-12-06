<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPrestamo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuarioID');
            $table->unsignedBigInteger('equipoID');
            $table->unsignedBigInteger('docenteID');
            $table->timestamps();
            $table->longText('detalle');
            $table->boolean('estado');
            $table->foreign('usuarioID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('equipoID')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('docenteID')->references('id')->on('docentes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
