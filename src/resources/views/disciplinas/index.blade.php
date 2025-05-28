@extends('adminlte::page')

@section('title', 'Disciplinas')

@section('content_header')
    <h1>Disciplinas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Disciplinas</h3>
        <a href="{{ route('disciplinas.create') }}" class="btn btn-primary float-right">Nova Disciplina</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" style="font-size: 15px;">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Curso</th>
                    <th>Professor</th>
                    <th style="width: 100px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($disciplinas as $disciplina)
                    <tr>
                        <td>{{ $disciplina->nome }}</td>
                        <td>{{ $disciplina->curso->curso ?? '-' }}</td>
                        <td>{{ $disciplina->professor->nome ?? '-' }}</td>
                        <td>
                            <form action="{{ route('disciplinas.destroy', $disciplina->id) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir?')" title="Excluir"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
