@extends('layouts.app')

@section('title', 'Visualizar Documento')

@section('content')
<h1>Visualizar Documento</h1>

<div class="mb-3">
    <strong>Descrição:</strong>
    <p>{{ $documento->descricao }}</p>
</div>

<div class="mb-3">
    <strong>Horas:</strong>
    <p>{{ $documento->horas_in }}</p>
</div>

<div class="mb-3">
    <strong>Status:</strong>
    <p>{{ ucfirst($documento->status) }}</p>
</div>

<div class="mb-3">
    <strong>Categoria:</strong>
    <p>{{ $documento->categoria->nome ?? 'Sem categoria' }}</p>
</div>

<div class="mb-3">
    <strong>PDF:</strong><br>
    <a href="{{ asset('storage/' . $documento->url) }}" class="btn btn-sm btn-outline-primary" target="_blank">Abrir PDF</a>
</div>

<a href="{{ route('documentos.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
