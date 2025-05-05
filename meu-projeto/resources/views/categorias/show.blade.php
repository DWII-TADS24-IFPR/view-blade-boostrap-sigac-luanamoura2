@extends('layouts.app')

@section('title', 'Detalhes da Categoria')

@section('content')
    <h1 class="my-4">Detalhes da Categoria</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Nome:</strong> {{ $categoria->nome }}</li>
    </ul>

    <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
