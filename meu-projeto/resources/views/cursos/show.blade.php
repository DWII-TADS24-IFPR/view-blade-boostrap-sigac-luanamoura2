@extends('layouts.app')

@section('title', 'Detalhes do Curso')

@section('content')
    <h1 class="my-4">Detalhes do Curso</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Nome:</strong> {{ $curso->nome }}</li>
        <li class="list-group-item"><strong>Total de Horas:</strong> {{ $curso->total_horas }} horas</li>
    </ul>

    <a href="{{ route('cursos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
