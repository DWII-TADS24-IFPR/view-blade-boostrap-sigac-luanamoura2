@extends('layouts.app')

@section('title', 'Turmas')

@section('content')
    <h1 class="my-4">Turmas</h1>

    <a href="{{ route('turmas.create') }}" class="btn btn-primary mb-3">Nova Turma</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Período</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($turmas as $turma)
                <tr>
                    <td>{{ $turma->nome }}</td>
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
            @empty
                <tr><td colspan="3">Nenhuma turma cadastrada.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
