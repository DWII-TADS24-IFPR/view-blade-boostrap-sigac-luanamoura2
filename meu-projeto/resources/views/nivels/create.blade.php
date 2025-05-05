@extends('layouts.app')

@section('title', 'Create Nivel')

@section('content')

<h1>CRIAR NOVO NIVEL</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('nivels.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<a href="{{ route('nivels.index') }}" class="btn btn-primary">Voltar</a>


@endsection