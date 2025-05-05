@extends('layouts.app')

@section('title', 'Editar Nível')

@section('content')

<h1>Editar Nível</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('niveis.update', $nivel->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $nivel->nome) }}" required>
    </div>

    <button type="submit" class="btn btn-warning">Atualizar</button>
</form>

<a href="{{ route('niveis.index') }}" class="btn btn-secondary">Voltar</a>

@endsection
