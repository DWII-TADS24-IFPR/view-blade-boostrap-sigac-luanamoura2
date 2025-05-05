@extends('layouts.app')

@section('title', 'Criar Novo Documento')

@section('content')

<h1>Criar Novo Documento</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('documentos.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<a href="{{ route('documentos.index') }}" class="btn btn-secondary">Voltar</a>

@endsection
