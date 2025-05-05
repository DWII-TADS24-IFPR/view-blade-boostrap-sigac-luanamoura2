@extends('layouts.app')

@section('title', 'Documentos')

@section('content')
    <h1 class="my-4">Documentos</h1>

    <a href="{{ route('documentos.create') }}" class="btn btn-primary mb-3">Novo Documento</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($documentos as $documento)
                <tr>
                    <td>{{ $documento->nome }}</td>
                    <td>{{ Str::limit($documento->descricao, 50) }}</td>
                    <td>
                        <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Confirmar exclusão?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Nenhum documento cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
