@extends('adminlte::page')

@section('title', 'Nova Disciplina')

@section('content_header')
    <h1>Cadastrar Nova Disciplina</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title mb-0">Nova Disciplina</h3>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('disciplinas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome da Disciplina</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="curso_id">Curso</label>
                <select name="curso_id" id="curso_id" class="form-control">
                    <option value="">-- Selecione --</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->curso }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="professor_id">Professor</label>
                <select name="professor_id" id="professor_id" class="form-control">
                    <option value="">-- Selecione --</option>
                    @foreach($professores as $professor)
                        <option value="{{ $professor->id }}">{{ $professor->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="aluno_id">Aluno</label>
                <select name="aluno_id" id="aluno_id" class="form-control">
                    <option value="">-- Selecione --</option>
                    @foreach($alunos as $aluno)
                        <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success mt-3 mr-2">Salvar</button>
                <a href="{{ route('disciplinas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
            </div>
        </form>
    </div>
</div>
@stop
