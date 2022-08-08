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
        Schema::create('mineria', function (Blueprint $table) {
            $table->id('id_contenedor');
            $table->string('estado');
            $table->string('tipoBasura');
            $table->integer('cantidad');
            $table->string('frecuencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mineria');
    }
};
