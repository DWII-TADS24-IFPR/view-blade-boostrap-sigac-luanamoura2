@extends('layouts.app')

@section('title', 'Detalhes do Documento')

@section('content')
    <h1 class="my-4">Detalhes do Documento</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Nome:</strong> {{ $documento->nome }}</li>
        <li class="list-group-item"><strong>Descrição:</strong> {{ $documento->descricao }}</li>
    </ul>

    <a href="{{ route('documentos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
