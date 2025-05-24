@extends('adminlte::page')

@section('title', 'Cadastro de Alunos')

@section('content_header')
    <h1>Alunos</h1>
@stop

@section('plugins.Datatables', true)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Alunos</h3>
        </div>

        <div class="card-body">
            <div>
                <a href="{{ route('aluno.create') }}" type="button" class="btn btn-primary" style="width:80px;">Novo</a>
            </div>
            <br>
            <table class="table table-bordered table-striped dataTable dtr-inline" id="aluno-table" style="font-size: 15px;">
                <thead>
                    <tr>
                        <th style="width: 5%">Id</th>
                        <th style="width: 20%">Aluno</th>
                        <th style="width: 20%">Email</th>
                        <th style="width: 20%">Telefone</th>
                        <th style="width: 20%">Curso</th>
                        <th style="width: 10%">Ações</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
@stop

@section('js')

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#aluno-table').DataTable({
                language: {
                    "url": "{{ asset('js/pt-br.json') }}"
                },
                processing: true,
                serverSide: true,
                ajax: "{{ route('aluno.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nome',
                        name: 'nome'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'telefone',
                        name: 'telefone'
                    },
                    {
                        data: 'curso',
                        name: 'curso',
                        render: function(data, type, row) {
                            // Se o relacionamento veio corretamente, exibe o nome do curso
                            if (row.curso && row.curso.curso) {
                                return row.curso.curso;
                            }
                            // Se não, tenta exibir o id do curso
                            if (row.curso_id) {
                                return 'ID: ' + row.curso_id;
                            }
                            return 'N/A';
                        }
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@stop