<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('evento_calendarios', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->enum('tipo', ['Férias', 'Prova', 'Trabalho']);
        $table->date('data');
        $table->unsignedBigInteger('curso_id'); // Relaciona com cursos
        $table->timestamps();

        $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
    });
}
};