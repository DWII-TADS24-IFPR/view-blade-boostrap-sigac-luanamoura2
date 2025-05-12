@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
<h1 class="my-4">Editar Aluno</h1>

<form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $aluno->nome) }}">
        @error('nome') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf', $aluno->cpf) }}">
        @error('cpf') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $aluno->email) }}">
        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="text" name="senha" id="senha" class="form-control" value="{{ old('senha', $aluno->senha) }}">
        @error('senha') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label for="turma_id" class="form-label">Turma ID</label>
        <input type="text" name="turma_id" id="turma_id" class="form-control" value="{{ old('turma_id', $aluno->turma_id) }}">
        @error('turma_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
