@extends('layouts.app')

@section('title', 'Turmas')

@section('content')
    <div class="container">
        <h1 class="my-4">Lista de Turmas</h1>

        <a href="{{ route('turmas.create') }}" class="btn btn-primary mb-3">Adicionar Turma</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Ano</th>
                    <th>Período</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($turmas as $turma)
                    <tr>
                        <td>{{ $turma->ano }}</td>
                        <td>{{ $turma->periodo }}</td>
                        <td>
                            <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Confirmar exclusão?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
