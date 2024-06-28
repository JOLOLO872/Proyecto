<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('apellido',20);
            $table->string('nombre',20);
            $table->string('posicion',20);
            $table->integer('numero');
            $table->timestamps();
            $table->unsignedInteger('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
