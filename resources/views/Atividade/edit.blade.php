@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Atividade</h1>

    <!-- Formulário para edição de atividade -->
    <form action="{{ route('atividades.update', $atividade) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $atividade->nome) }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required>{{ old('descricao', $atividade->descricao) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data e Hora de Início</label>
            <input type="datetime-local" class="form-control" id="data_inicio" name="data_inicio" value="{{ old('data_inicio', \Carbon\Carbon::parse($atividade->data_inicio)->format('Y-m-d\TH:i')) }}" required>

        </div>

        <div class="mb-3">
            <label for="data_termino" class="form-label">Data e Hora de Término</label>
            <input type="datetime-local" class="form-control" id="data_termino" name="data_termino" value="{{ old('data_termino', \Carbon\Carbon::parse($atividade->data_termino)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="pendente" {{ $atividade->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="concluída" {{ $atividade->status == 'concluída' ? 'selected' : '' }}>Concluída</option>
                <option value="cancelada" {{ $atividade->status == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="{{ route('atividades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
