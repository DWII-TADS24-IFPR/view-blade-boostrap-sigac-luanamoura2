@extends('layouts.app')

@section('title', 'Detalhes da Turma')

@section('content')
    <h1 class="my-4">Detalhes da Turma</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Nome:</strong> {{ $turma->nome }}</li>
        <li class="list-group-item"><strong>Período:</strong> {{ $turma->periodo }}</li>
    </ul>

    <a href="{{ route('turmas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
