<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Curso;
use App\Models\Professor;
use App\Models\Aluno;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $disciplinas = Disciplina::with(['curso', 'professor', 'aluno'])->get();
    $cursos = Curso::all();
    return view('disciplinas.index', compact('disciplinas', 'cursos'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('disciplinas.create', [
        'cursos' => Curso::all(),
        'professores' => Professor::all(),
        'alunos' => Aluno::all()
    ]);
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    Disciplina::create($request->all());
    return redirect()->route('disciplinas.index')->with('success', 'Disciplina criada com sucesso!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disciplina $disciplina)
{
    $disciplina->delete();
    return back()->with('success', 'Disciplina deletada.');
}

    /**
     * Display a listing of the resource by course.
     */
    public function disciplinasPorCurso($curso_id)
{
    $disciplinas = \App\Models\Disciplina::with(['curso', 'professor', 'aluno'])->where('curso_id', $curso_id)->get();
    return response()->json($disciplinas);
}


}