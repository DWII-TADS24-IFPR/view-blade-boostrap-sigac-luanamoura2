@extends('layouts.app')

@section('title', 'Detalhes da Declaração')

@section('content')
    <h1 class="my-4">Detalhes da Declaração</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Tipo:</strong> {{ $declaracao->tipo }}</li>
        <li class="list-group-item"><strong>Texto:</strong> <pre>{{ $declaracao->texto }}</pre></li>
    </ul>

    <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
