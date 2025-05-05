@extends('layouts.app')

@section('title', 'Lista de Cursos')

@section('content')
    <h1 class="my-4">Cursos</h1>

    <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Novo Curso</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Carga Horária</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cursos as $curso)
                <tr>
                    <td>{{ $curso->nome }}</td>
                    <td>{{ $curso->carga_horaria }} horas</td>
                    <td>
                        <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum curso cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
