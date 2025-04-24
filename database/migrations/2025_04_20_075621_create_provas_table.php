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
        Schema::create('provas', function (Blueprint $table) {
            $table->id();
            
            $table->string('tema');
            $table->date('data_lancamento');
            $table->date('data_entrega');
            $table->string('tipo');
            $table->foreignId('professor_id')->constrained('professores');
            $table->foreignId('disciplina_id')->constrained('diciplinas');
            $table->foreignId('curso_id')->constrained('cursos');
            $table->foreignId('aluno_id')->constrained('alunos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provas');
    }
};
