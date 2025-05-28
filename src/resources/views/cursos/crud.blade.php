@extends('adminlte::page')

@section('title', 'Cadastro de Cursos')

@section('content_header')


@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title mb-0">Cadastro de Cursos</h3>
    </div>
    <div class="card-body">
        <form method="post" action="{{ isset($cur->id) ? route('curso.update', ['curso' => $cur->id]) : route('curso.store') }}">
            @csrf
            @if(isset($cur->id))
                @method('PUT')
            @endif
            <label for="curso">Curso</label>
            <input type="text" class="form-control" id="curso" name="curso" placeholder=""
                value="{{ old('curso', $cur->curso ?? '') }}">
            @if ($errors->has('curso'))
                <span style="color: red;">
                    {{ $errors->first('curso') }}
                </span>
            @endif
            <br>
            <label>Periodo</label>
            <select class="form-control" id="periodo" name="periodo">
                <option value="">Selecione</option>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ old('periodo', $cur->periodo ?? '') == $i ? 'selected' : '' }}> {{ $i }}º Período</option>
                @endfor
            </select>
            @if ($errors->has('periodo'))
                <span style="color: red;">
                    {{ $errors->first('periodo') }}
                </span>
            @endif
            <br>
            <label for="dt_inicio">Data de Início do Curso</label>
            <input type="date" class="form-control" id="dt_inicio" name="dt_inicio"
                value="{{ old('dt_inicio', isset($cur->dt_inicio) ? \Carbon\Carbon::parse($cur->dt_inicio)->format('Y-m-d') : '') }}">
            @if ($errors->has('dt_inicio'))
                <span style="color: red;">
                    {{ $errors->first('dt_inicio') }}
                </span>
            @endif
            <br>
            <label for="dt_final">Data de Finalização do Curso</label>
            <input type="date" class="form-control" id="dt_final" name="dt_final"
                value="{{ old('dt_final', isset($cur->dt_final) ? \Carbon\Carbon::parse($cur->dt_final)->format('Y-m-d') : '') }}">
            @if ($errors->has('dt_final'))
                <span style="color: red;">
                    {{ $errors->first('dt_final') }}
                </span>
            @endif
            <br>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success mr-2">Registrar</button>
                <a href="{{ route('curso.index') }}" type="button" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
    <script src="{{ asset('vendor/jquery/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.maskMoney.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

        });
    </script>
@stop