@extends('layouts.app')

@section('title', 'Níveis')

@section('content')
    <h1 class="my-4">Níveis</h1>

    <a href="{{ route('niveis.create') }}" class="btn btn-primary mb-3">Novo Nível</a>

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
            @forelse($niveis as $nivel)
                <tr>
                    <td>{{ $nivel->nome }}</td>
                    <td>{{ Str::limit($nivel->descricao, 50) }}</td>
                    <td>
                        <a href="{{ route('niveis.edit', $nivel->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('niveis.destroy', $nivel->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Confirmar exclusão?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Nenhum nível cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
