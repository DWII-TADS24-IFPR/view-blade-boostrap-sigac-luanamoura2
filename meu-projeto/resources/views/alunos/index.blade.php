@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Alunos</h1>
    <a href="{{ route('alunos.create') }}" class="btn btn-primary mb-3">Novo Aluno</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
            <tr>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->email }}</td>
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
