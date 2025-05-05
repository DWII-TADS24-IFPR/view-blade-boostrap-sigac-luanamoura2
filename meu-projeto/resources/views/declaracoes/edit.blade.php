@extends('layouts.app')

@section('title', 'Editar Declaração')

@section('content')

<h1>Editar Declaração</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('declaracoes.update', $declaracao->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $declaracao->nome) }}" required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" required>{{ old('descricao', $declaracao->descricao) }}</textarea>
    </div>

    <button type="submit" class="btn btn-warning">Atualizar</button>
</form>

<a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">Voltar</a>

@endsection
