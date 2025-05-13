@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Categorias</h1>

    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Adicionar Categoria</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Curso</th>
                <th>Total de Horas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nome }}</td>
                    <td>{{ $categoria->curso ? $categoria->curso->nome : 'Curso não encontrado' }}</td>
                    <td>{{ number_format($categoria->max_horas, 0, ',', '.') }} horas</td> <!-- Aqui está o ajuste -->
                    <td>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
