@extends('layouts.app')

@section('title', 'Detalhes do Comprovante')

@section('content')
    <h1 class="my-4">Detalhes do Comprovante</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Descrição:</strong> {{ $comprovante->descricao }}</li>
        <li class="list-group-item">
            <strong>Arquivo:</strong>
            @if ($comprovante->arquivo)
                <a href="{{ asset('storage/' . $comprovante->arquivo) }}" target="_blank">Ver Arquivo</a>
            @else
                Nenhum arquivo disponível.
            @endif
        </li>
    </ul>

    <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
