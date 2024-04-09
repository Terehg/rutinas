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
        Schema::create('rutina_ejercicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dia_id')->constrained('dias');
            $table->foreignId('ejercicio_id')->constrained('ejercicios');
            $table->integer('peso');
            $table->integer('repeticiones');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutina_ejercicios');
    }
};
