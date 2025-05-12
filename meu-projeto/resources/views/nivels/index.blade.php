@extends('layouts.app')

@section('title', 'Níveis')

@section('content')
    <div class="container">
        <h1 class="my-4">Lista de Nivels</h1>

        <a href="{{ route('nivels.create') }}" class="btn btn-primary mb-3">Adicionar Nível</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nivels as $nivel)
                    <tr>
                        <td>{{ $nivel->nome }}</td>
                        <td>{{ Str::limit($nivel->descricao, 50) }}</td>
                        <td>
                            <a href="{{ route('nivels.edit', $nivel->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('nivels.destroy', $nivel->id) }}" method="POST" class="d-inline">
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
