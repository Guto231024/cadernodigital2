<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caborn\Caborn;
use App\Models\Professor;
use App\Models\Curso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use GuzzleHttp\Client;
class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Carrega os professors junto com o curso relacionado
            $data = Professor::with('curso')->get();

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $actionBtns = '
                        <a href="' . route("professor.edit", $row->id) . '" class="btn btn-outline-info btn-sm"><i class="fas fa-pen"></i></a>

                        <form action="' . route("professor.destroy", $row->id) . '" method="POST" style="display:inline" onsubmit="return confirm(\'Deseja realmente excluir este registro?\')">
                            ' . csrf_field() . '
                            ' . method_field("DELETE") . '
                            <button type="submit" class="btn btn-outline-danger btn-sm ml-2"><i class="fas fa-trash"></i></button>
                        </form>
                    ';
                    return $actionBtns;
                })
                ->rawColumns(['action']) // Para não escapar o HTML dos botões
                ->make(true);
        }

        return view('professores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $cursos = Curso::all(); // Pega todos os cursos do banco

    return view('professores.crud', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nome = $request->post('nome');
        $cpf = $request->post('cpf');
        $dt_nascimento = $request->post('dt_nascimento');
        $email = $request->post('email');
        $telefone = $request->post('telefone');
        $curso_id = $request->post('curso_id');

        $edit = new Professor();

        $edit->nome = $nome;
        $edit->cpf = $cpf;
        $edit->dt_nascimento = $dt_nascimento;
        $edit->email = $email;
        $edit->telefone = $telefone;
        $edit->curso_id = $curso_id;
        $edit->save();
        return redirect()->route('professor.index');
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
        $edit = Professor::find($id); // Busca o professor pelo id
        $cursos = Curso::all(); // Pega todos os cursos do banco

        return view('professores.crud', compact('edit', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nome = $request->post('nome');
        $cpf = $request->post('cpf');
        $dt_nascimento = $request->post('dt_nascimento');
        $email = $request->post('email');
        $telefone = $request->post('telefone');
        $curso_id = $request->post('curso_id');

        // Atualiza os dados do professor
        Professor::whereId($id)->update([
            'nome' => $nome,
            'cpf' => $cpf,
            'dt_nascimento' => $dt_nascimento,
            'email' => $email,
            'telefone' => $telefone,
            'curso_id' => $curso_id
        ]);

        return redirect()->route('professor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Verifica se o professor existe
        $professor = Professor::find($id);
        if (!$professor) {
            return redirect()->route('professor.index')->with('error', 'Professor não encontrado.');
        }

        // Deleta o professor
        $professor->delete();

        return redirect()->route('professor.index')->with('success', 'Professor deletado com sucesso.');
    }
     public function consultaCep(Request $request)
    {
        // CONSUMO DE API USANDO O GET_FILE_CONTENTS
        // $cep = $request->input('cep');
        // $url = "https://viacep.com.br/ws/{$cep}/json/";

        // $response = file_get_contents($url);

        // return response()->json(json_decode($response));


        // CONSUMO DE API USANDO O CURL
        // $cep = $request->input('cep');
        // $url = "https://viacep.com.br/ws/{$cep}/json/";
    
        // // Inicializa o cURL
        // $ch = curl_init();
    
        // // Configurações do cURL
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Timeout de 10 segundos
    
        // // Executa a requisição
        // $response = curl_exec($ch);
    
        // // Verifica se houve erro
        // if (curl_errno($ch)) {
        //     return response()->json(['error' => 'Erro ao consultar o CEP.'], 500);
        // }
    
        // // Fecha o cURL
        // curl_close($ch);

        // // Retorna a resposta decodificada
        // return response()->json(json_decode($response));

        // CONSUMO DE API USANDO O GuzzleHttp

        $cep = $request->input('cep');
        $url = "https://viacep.com.br/ws/{$cep}/json/";
    
        // Inicializa o studente Guzzle
        $client= new Client();
    
        try {
            // Faz a requisição GET
            $response = $client->request('GET', $url);
    
            // Verifica o status da resposta
            if ($response->getStatusCode() === 200) {
                $data = json_decode($response->getBody(), true); // Decodifica o JSON
                return response()->json($data);
            }
    
            return response()->json(['error' => 'Erro ao consultar o CEP.'], $response->getStatusCode());
        } catch (\Exception $e) {
            // Trata erros de requisição
            return response()->json(['error' => 'Erro ao consultar o CEP: ' . $e->getMessage()], 500);
        }
    }
}
