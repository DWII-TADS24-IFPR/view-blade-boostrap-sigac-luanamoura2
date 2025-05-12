@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Alunos</h1>

    <a href="{{ route('alunos.create') }}" class="btn btn-primary mb-3">Adicionar Aluno</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Turma</th> 
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>{{ $aluno->turma->nome }}</td> 
                    <td>
                        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline;">
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
