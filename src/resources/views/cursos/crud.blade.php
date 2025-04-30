@extends('adminlte::page')

@section('title', 'Cadastro de Cursos')

@section('content_header')


@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastro de Cursos</h3>
        </div>
        <div class="card-body"s>
            <div class=" form-group">

                @if (isset($cur->id))
                    <form method="post" action="{{ route('curso.update', ['curso' => $cur->id]) }}">
                        @csrf
                        @method('PUT')
                    @else
                        <form method="post" action="{{ route('curso.store') }}">
                            @csrf
                @endif

                <label for="curso">Curso</label>
                <input type="text" class="form-control" id="curso" name="curso" placeholder=""
                    value="{{ $cur->curso ?? old('curso') }}">
                @if ($errors->has('curso'))
                    <span style="color: red;">
                        {{ $errors->first('curso') }}
                    </span>
                @endif
                <br>

                <label>Periodo</label>
                <select class="form-control" id="periodo" name="periodo">
                    <option value="">Selecione</option>
                    <option value="1" {{ (isset($curso->periodo) && $curso->periodo == 1) ? 'selected' : '' }}> 1º Perido
                    </option>
                    <option value="2" {{ (isset($curso->periodo) && $curso->periodo == 2) ? 'selected' : '' }}> 2º Peridos
                    </option>
                    <option value="3" {{ (isset($curso->periodo) && $curso->periodo == 3) ? 'selected' : '' }}> 3º Peridos
                    </option>
                    <option value="4" {{ (isset($curso->periodo) && $curso->periodo == 4) ? 'selected' : '' }}> 4º Peridos
                    </option>
                    <option value="5" {{ (isset($curso->periodo) && $curso->periodo == 5) ? 'selected' : '' }}> 5º Peridos
                    </option>
                    <option value="6" {{ (isset($curso->periodo) && $curso->periodo == 6) ? 'selected' : '' }}> 6º Peridos
                    </option>
                    <option value="7" {{ (isset($curso->periodo) && $curso->periodo == 7) ? 'selected' : '' }}> 7º Peridos
                    </option>
                    <option value="8" {{ (isset($curso->periodo) && $curso->periodo == 8) ? 'selected' : '' }}> 8º Peridos
                    </option>
                    <option value="9" {{ (isset($curso->periodo) && $curso->periodo == 9) ? 'selected' : '' }}> 9º Peridos
                    </option>
                    <option value="10" {{ (isset($curso->periodo) && $curso->periodo == 10) ? 'selected' : '' }}> 10º
                        Peridos
                    </option>
                    <option value="11" {{ (isset($curso->periodo) && $curso->periodo == 11) ? 'selected' : '' }}> 11º
                        Peridos
                    </option>
                    <option value="12" {{ (isset($curso->periodo) && $curso->periodo == 12) ? 'selected' : '' }}> 12º
                        Peridos
                    </option>
                </select>
                @if ($errors->has('periodo'))
                    <span style="color: red;">
                        {{ $errors->first('periodo') }}
                    </span>
                @endif

                <br>
                <label for="dt_inicio">Data de Início do Curso</label>
                <input type="date" class="form-control" id="dt_inicio" name="dt_inicio"
                    value="{{ isset($dt_inicio->dt_inicio) ? \Carbon\Carbon::parse($dt_inicio->dt_inicio)->format('Y-m-d') : old('dt_inicio') }}">


                @if ($errors->has('dt_inicio'))
                    <span style="color: red;">
                        {{ $errors->first('dt_inicio') }}
                    </span>
                @endif
                <br>

                <label for="dt_final">Data de Finalização do Curso</label>
                <input type="date" class="form-control" id="dt_final" name="dt_final"
                    value="{{ isset($dt_final->dt_final) ? \Carbon\Carbon::parse($dt_final->dt_final)->format('Y-m-d') : old('dt_inicio') }}">

                @if ($errors->has('dt_final'))
                    <span style="color: red;">
                        {{ $errors->first('dt_final') }}
                    </span>
                @endif
                <br>

            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="{{ route('curso.index') }}" type="button" class="btn btn-secondary">Voltar</a>
        </div>
        </form>

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
        f

        $(document).ready(function() {

            

        });
    </script>
@stop