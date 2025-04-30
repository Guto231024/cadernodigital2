<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Yajra\DataTables\Facades\DataTables;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
           
            $data = Curso::latest()->get();
            
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $actionBtns = '
                        <a href="' . route("curso.edit", $row->id) . '" class="btn btn-outline-info btn-sm"><i class="fas fa-pen"></i></a>
                        
                        <form action="' . route("curso.destroy", $row->id) . '" method="POST" style="display:inline" onsubmit="return confirm(\'Deseja realmente excluir este registro?\')">
                            ' . csrf_field() . '
                            ' . method_field("DELETE") . '
                            <button type="submit" class="btn btn-outline-danger btn-sm ml-2")><i class="fas fa-trash"></i></button>
                        </form>
                    ';
                    return $actionBtns;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('cursos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cursos.crud');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $curso = $request->post('curso');
        $periodo = $request->post('periodo');
        $dt_inicio = $request->post('dt_inicio');
        $dt_final = $request->post('dt_final');
        $cur = new Curso();

        $cur->curso = $curso;  
        $cur->periodo = $periodo;
        $cur->dt_inicio = $dt_inicio;
        $cur->dt_final = $dt_final;
        $cur->save();
        return view('cursos.index');

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
    public function edit($id)
    {
        $cur = Curso::find($id);

        $output = array(
            'cur' => $cur,
        );

        return view('cursos.crud', $output);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $curso = $request->post('curso');
        $periodo = $request->post('periodo');
        $dt_inicio = $request->post('dt_inicio');
        $dt_final = $request->post('dt_final');

        $cur = Curso::find($id);

        $cur->curso = $curso;  
        $cur->periodo = $periodo;
        $cur->dt_inicio = $dt_inicio;
        $cur->dt_final = $dt_final;
        $cur->update();
        
        return view('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cur = Curso::find($id);
        $cur->delete();
        return view('cursos.index');
    }
}
