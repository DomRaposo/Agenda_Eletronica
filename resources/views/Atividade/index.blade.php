@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Minhas Atividades</h1>
    <a href="{{ route('atividades.create') }}" class="btn btn-primary">Nova Atividade</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Data Início</th>
                <th>Data Término</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($atividades as $atividade)
            <tr>
                <td>{{ $atividade->nome }}</td>
                <td>{{ $atividade->descricao }}</td>
                <td>{{ $atividade->data_inicio }}</td>
                <td>{{ $atividade->data_termino }}</td>
                <td>{{ ucfirst($atividade->status) }}</td>
                <td>
                    <a href="{{ route('atividades.edit', $atividade) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('atividades.destroy', $atividade) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
