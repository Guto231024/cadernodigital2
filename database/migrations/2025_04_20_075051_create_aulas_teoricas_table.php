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
        Schema::create('aulas_teoricas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('anotacoes');
            $table->date('horario');
            $table->foreignId('curso_id')->constrained('cursos');
            $table->foreignId('professor_id')->constrained('professores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas_teoricas');
    }
};
