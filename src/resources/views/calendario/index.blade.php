@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Calendário</h3>
    </div>
    <div class="card-body">
        {{-- Mensagens de sucesso --}}
        @if(session('success'))
            <div class="alert alert-success" id="alert-success">{{ session('success') }}</div>
        @endif

        {{-- Filtro por curso --}}
        <form method="GET" action="{{ route('calendario.index') }}" class="mb-4">
            <div class="form-group">
                <label for="curso_id">Selecione o curso:</label>
                <select name="curso_id" id="curso_id" class="form-control" onchange="this.form.submit()">
                    <option value="">-- Selecione --</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ $cursoSelecionado == $curso->id ? 'selected' : '' }}>
                            {{ $curso->curso }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        {{-- Botão para abrir modal de novo evento --}}
        @if($cursoSelecionado)
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalNovoEvento">Novo Evento</button>
        @endif

        {{-- Lista de eventos --}}
        @if(count($eventos))
        <table class="table table-bordered table-striped" style="font-size: 15px;">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Data de Inicio</th>
                    <th>Data de Fim</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                <tr>
                    <td>{{ $evento->titulo }}</td>
                    <td>{{ $evento->tipo }}</td>
                    <td>{{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y') }}</td>
                    <td>{{ $evento->data_fim ? \Carbon\Carbon::parse($evento->data_fim)->format('d/m/Y') : '-' }}</td>
                    <td>
                        <form action="{{ route('calendario.destroy', $evento->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este evento?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @elseif($cursoSelecionado)
            <p>Sem eventos cadastrados para este curso.</p>
        @endif
    </div>
</div>
{{-- Modal de novo evento --}}
<div class="modal fade" id="modalNovoEvento" tabindex="-1" role="dialog" aria-labelledby="modalNovoEventoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNovoEventoLabel">Novo Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('calendario.store') }}">
        @csrf
        <input type="hidden" name="curso_id" value="{{ $cursoSelecionado }}">
        <div class="modal-body">
          <div class="form-group">
            <label for="titulo">Título do Evento</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="form-control" required>
              <option value="Férias">Férias</option>
              <option value="Prova">Prova</option>
              <option value="Trabalho">Trabalho</option>
            </select>
          </div>
          <div class="form-group">
            <label for="data">Data de Início</label>
            <input type="date" name="data" id="data" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="data_fim">Data de Fim</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Adicionar Evento</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#alert-success').fadeOut('slow');
        }, 2000);
    });
</script>
@endsection
