@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Aluno</h1>
    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Adicione outros campos conforme necessário -->
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
