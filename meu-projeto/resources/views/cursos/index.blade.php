@extends('layouts.app')

@section('title', 'Lista de Cursos')

@section('content')
<h1 class="my-4">Lista de Cursos</h1>

<a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Adicionar Curso</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Total de Horas</th>
            <th>Sigla</th>
            <th>Nível</th>
            <th>Ações</th> 
        </tr>
    </thead>
    <tbody>
        @forelse ($cursos as $curso)
        <tr>
            <td>{{ $curso->nome }}</td>
            <td>{{ $curso->total_horas }} horas</td>
            <td>{{ $curso->sigla }}</td> 
            <td>{{ $curso->nivel ? $curso->nivel->nome : 'Nível não disponível' }}</td>
          
            <td>
                <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Tem certeza que deseja excluir este curso?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Nenhum curso cadastrado.</td> 
        </tr>
        @endforelse
    </tbody>
</table>
@endsection