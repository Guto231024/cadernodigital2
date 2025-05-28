<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\EventoCalendario;
use Illuminate\Http\Request;

class EventoCalendarioController extends Controller
{
    public function index(Request $request)
    {
        $cursos = Curso::all();
        $cursoSelecionado = $request->curso_id;
        $eventos = [];

        if ($cursoSelecionado) {
            $eventos = EventoCalendario::where('curso_id', $cursoSelecionado)->get();
        }

        return view('calendario.index', compact('cursos', 'cursoSelecionado', 'eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'tipo' => 'required',
            'data' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data',
            'curso_id' => 'required|exists:cursos,id',
        ]);

        EventoCalendario::create($request->all());

        return redirect()->back()->with('success', 'Evento adicionado com sucesso!');
    }

    public function destroy($id)
    {
        EventoCalendario::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Evento removido!');
    }
}
