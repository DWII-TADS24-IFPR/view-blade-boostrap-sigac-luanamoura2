@extends('layouts.app')

@section('title', 'Detalhes do Aluno')

@section('content')
    <h1 class="my-4">Detalhes do Aluno</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Nome:</strong> {{ $aluno->nome }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $aluno->email }}</li>
        <!-- Adicione outros campos -->
    </ul>

    <a href="{{ route('alunos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
