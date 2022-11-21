<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_estado');
            $table->string('Nombre');
            $table->string('Marca');
            $table->string('Modelo');
            $table->string('NumSerie')->nullable();
            $table->integer('Cantidad');
            $table->string('Ubicacion');
            $table->string('Foto');
            $table->foreign('id_estado')->references('id')->on('estado');
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
        Schema::dropIfExists('articulo');
    }
};
