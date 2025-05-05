@extends('layouts.app')

@section('title', 'Lista de Comprovantes')

@section('content')
    <h1 class="my-4">Comprovantes</h1>

    <a href="{{ route('comprovantes.create') }}" class="btn btn-primary mb-3">Novo Comprovante</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Descrição</th>
                <th>Arquivo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($comprovantes as $comprovante)
                <tr>
                    <td>{{ $comprovante->descricao }}</td>
                    <td>
                        @if ($comprovante->arquivo)
                            <a href="{{ asset('storage/' . $comprovante->arquivo) }}" target="_blank">Ver Arquivo</a>
                        @else
                            Nenhum arquivo
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('comprovantes.destroy', $comprovante->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum comprovante cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

