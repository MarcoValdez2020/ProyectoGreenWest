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
        Schema::create('contenedor', function (Blueprint $table) {
            $table->id('id_contenedor');
            $table->integer('capacidad');
            $table->boolean('estadoContenedor');
            $table->foreignId('id_usuario')->references('id_usuario')->on('usuario')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
                $table->foreignId('id_tipoConte')->references('id_tipoConte')->on('tipocontenedor')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenedor');
    }
};
