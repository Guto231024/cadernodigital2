<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EventoCalendarioController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('curso', App\Http\Controllers\CursoController::class);
Route::resource('aluno', App\Http\Controllers\AlunoController::class);
Route::resource('professor', App\Http\Controllers\ProfessorController::class);
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::resource('disciplinas', DisciplinaController::class);
Route::get('/calendario', [EventoCalendarioController::class, 'index'])->name('calendario.index');
Route::post('/calendario', [EventoCalendarioController::class, 'store'])->name('calendario.store');
Route::delete('/calendario/{id}', [EventoCalendarioController::class, 'destroy'])->name('calendario.destroy');



Route::get('/consulta-cep', [AlunoController::class, 'consultaCep'])->name('consulta.cep');
Route::get('/disciplinas-por-curso/{curso_id}', [DisciplinaController::class, 'disciplinasPorCurso']);
}
);
