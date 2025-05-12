@extends('layouts.app')

@section('title', 'Lista de Documentos')

@section('content')
<div class="container">
    <h1 class="my-4">Documentos</h1>

    <a href="{{ route('documentos.create') }}" class="btn btn-primary mb-3">Novo Documento</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Descrição</th>
                <th>Horas</th>
                <th>Categoria</th>
                <th>Status</th>
                <th>Arquivo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($documentos as $doc)
                <tr>
                    <td>{{ $doc->descricao }}</td>
                    <td>{{ $doc->horas_in }}</td>
                    <td>{{ $doc->categoria->nome ?? 'Sem categoria' }}</td>
                    <td>{{ ucfirst($doc->status) }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $doc->url) }}" target="_blank">Ver PDF</a>
                    </td>
                    <td>
                        <a href="{{ route('documentos.edit', $doc->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('documentos.destroy', $doc->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Tem certeza?')" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Nenhum documento encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
