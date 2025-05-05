@extends('layouts.app')

@section('title', 'Declarações')

@section('content')
    <h1 class="my-4">Declarações</h1>

    <a href="{{ route('declaracoes.create') }}" class="btn btn-primary mb-3">Nova Declaração</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Tipo</th>
                <th>Texto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($declaracoes as $declaracao)
                <tr>
                    <td>{{ $declaracao->tipo }}</td>
                    <td>{{ Str::limit($declaracao->texto, 50) }}</td>
                    <td>
                        <a href="{{ route('declaracoes.edit', $declaracao->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('declaracoes.destroy', $declaracao->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhuma declaração cadastrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
