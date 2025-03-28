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
            <label for="data_inicio">Data e Hora de Início</label>
            <input type="datetime-local" name="data_inicio" id="data_inicio" class="form-control">

        </div>

        <div class="form-group">
            <label for="data_termino">Data e Hora de Término</label>
            <input type="datetime-local" name="data_termino" id="data_termino" class="form-control">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="pendente">Pendente</option>
                <option value="concluída">Concluída</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Criar Atividade</button>
        <a href="{{ route('atividades.index') }}" class="btn btn-secondary mt-2">Voltar</a>
    </form>
</div>
@endsection
