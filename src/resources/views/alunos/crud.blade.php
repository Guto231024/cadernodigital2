@extends('adminlte::page')

@section('title', 'Cadastro de Alunos')

@section('content_header')

@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastro de Alunos</h3>
        </div>
        <div class="card-body"s>
            <div class="form-group">

                @if (isset($edit->id))
                    <form method="post" action="{{ route('aluno.update', ['aluno' => $edit->id]) }}">
                        @csrf
                        @method('PUT')
                    @else
                        <form method="post" action="{{ route('aluno.store') }}">
                            @csrf
                @endif

                <div class="row">
                    <div class="col-sm-10">
                        <label for="nome">Aluno</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder=""
                            value="{{ $edit->nome ?? old('nome') }}">
                        @if ($errors->has('nome'))
                            <span style="color: red;">
                                {{ $errors->first('nome') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-2">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder=""
                            value="{{ $edit->cpf ?? old('cpf') }}">
                        @if ($errors->has('cpf'))
                            <span style="color: red;">
                                {{ $errors->first('cpf') }}
                            </span>
                        @endif
                        <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label for="dt_nascimento">Data Nascimento</label>
                        <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento" placeholder=""
                            value="{{ $edit->dt_nascimento ?? old('dt_nascimento') }}">
                        @if ($errors->has('dt_nascimento'))
                            <span style="color: red;">
                                {{ $errors->first('dt_nascimento') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder=""
                            value="{{ $edit->email ?? old('email') }}">
                        @if ($errors->has('email'))
                            <span style="color: red;">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder=""
                            value="{{ $edit->telefone ?? old('telefone') }}">
                        @if ($errors->has('telefone'))
                            <span style="color: red;">
                                {{ $errors->first('telefone') }}
                            </span>
                        @endif
                        <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label for="cep">Cep</label>
                        <input type="text" class="form-control" id="cep" name="cep" placeholder=""
                            value="{{ $edit->cep ?? old('cep') }}">
                        @if ($errors->has('cep'))
                            <span style="color: red;">
                                {{ $errors->first('cep') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder=""
                            value="{{ $edit->logradouro ?? old('logradouro') }}">
                        @if ($errors->has('logradouro'))
                            <span style="color: red;">
                                {{ $errors->first('logradouro') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="numero">Numero</label>
                        <input type="text" class="form-control" id="numero" name="numero" placeholder=""
                            value="{{ $edit->numero ?? old('numero') }}">
                        @if ($errors->has('numero'))
                            <span style="color: red;">
                                {{ $errors->first('numero') }}
                            </span>
                        @endif
                        <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder=""
                            value="{{ $edit->bairro ?? old('bairro') }}">
                        @if ($errors->has('bairro'))
                            <span style="color: red;">
                                {{ $errors->first('bairro') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder=""
                            value="{{ $edit->cidade ?? old('cidade') }}">
                        @if ($errors->has('cidade'))
                            <span style="color: red;">
                                {{ $errors->first('cidade') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento" placeholder=""
                            value="{{ $edit->complemento ?? old('complemento') }}">
                        @if ($errors->has('complemento'))
                            <span style="color: red;">
                                {{ $errors->first('complemento') }}
                            </span>
                        @endif
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="uf">UF</label>
                        <input type="text" class="form-control" id="uf" name="uf" placeholder=""
                            value="{{ $edit->uf ?? old('uf') }}">
                        @if ($errors->has('uf'))
                            <span style="color: red;">
                                {{ $errors->first('uf') }}
                            </span>
                        @endif
                        <br>  
                </div>
                    <div class="col-sm-4">
                        <label for="curso_id">Curso</label>
                        <select class="form-control" id="curso_id" name="curso_id">
                            <option value="">Selecione o curso</option>
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}"
                                    {{ isset($edit->curso_id) && $edit->curso_id == $curso->id ? 'selected' : '' }}>
                                    {{ $curso->curso }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('curso_id'))
                            <span style="color: red;">
                                {{ $errors->first('curso_id') }}
                            </span>
                        @endif
                        <br>
                    </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="{{ route('aluno.index') }}" type="button" class="btn btn-secondary">Voltar</a>
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
        $(document).ready(function() {

            // $('#cep').on('blur', function() {
                
            //     let cep = $('#cep').val();

            //     $.ajax({
            //         url: 'https://viacep.com.br/ws/' + cep + '/json/',
            //         type: 'GET',
            //         dataType: 'json',
            //         success: function(data) {
            //             if (!data.erro) {
            //                 $('#logradouro').val(data.logradouro);
            //                 $('#bairro').val(data.bairro);
            //                 $('#cidade').val(data.localidade);
            //                 $('#uf').val(data.uf);
            //             } else {
            //                 alert('CEP não encontrado.');
            //             }
            //         },
            //         error: function() {
            //             alert('Erro ao buscar o CEP.');
            //         }
            //     });
            // });

            $('#cep').on('blur', function() {
                
                let cep = $('#cep').val();

                let data_get = {
                    cep: cep
                };

                $.ajax({
                    url: '/consulta-cep',
                    type: 'GET',
                    dataType: 'json',
                    data: data_get,
                    success: function(data) {

                        console.log(data);

                        if (!data.erro) {
                            $('#logradouro').val(data.logradouro);
                            $('#bairro').val(data.bairro);
                            $('#cidade').val(data.localidade);
                            $('#uf').val(data.uf);
                        } else {
                            alert('CEP não encontrado.');
                        }
                    },
                    error: function() {
                        //alert('Erro ao buscar o CEP.');
                    }
                });
            });


        });
    </script>
@stop