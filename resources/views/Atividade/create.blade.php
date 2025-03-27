@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Nova Atividade</h1>

    <form method="POST" action="{{ route('atividades.store') }}">
        @csrf

        <div class="form-group">
            <label for="nome">Nome da Atividade</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="4" required>{{ old('descricao') }}</textarea>
        </div>

        <div class="form-group">
            <label for="inicio">Data e Hora de Início</label>
            <input type="datetime-local" class="form-control" id="inicio" name="inicio" value="{{ old('inicio') }}" required>
        </div>

        <div class="form-group">
            <label for="fim">Data e Hora de Término</label>
            <input type="datetime-local" class="form-control" id="fim" name="fim" value="{{ old('fim') }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="pendente">Pendente</option>
                <option value="concluída">Concluída</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Criar Atividade</button>
        <a href="{{ route('atividades.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
