@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-header bg-warning text-white">
      <h4 class="mb-0">Editar Aluno</h4>
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" name="nome" class="form-control rounded-3" required value="{{ old('nome', $aluno->nome) }}">
        </div>

        <div class="mb-3">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" name="cpf" class="form-control rounded-3" required value="{{ old('cpf', $aluno->cpf) }}">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" name="email" class="form-control rounded-3" required value="{{ old('email', $aluno->email) }}">
        </div>

        <div class="mb-3">
          <label for="senha" class="form-label">Nova Senha (deixe em branco para manter)</label>
          <input type="password" name="senha" class="form-control rounded-3">
        </div>

        <div class="mb-3">
          <label for="curso_id" class="form-label">Curso</label>
          <select name="curso_id" class="form-select rounded-3" required>
            <option value="">Selecione um curso</option>
            @foreach($cursos as $curso)
              <option value="{{ $curso->id }}" {{ $aluno->curso_id == $curso->id ? 'selected' : '' }}>
                {{ $curso->nome }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="turma_id" class="form-label">Turma</label>
          <select name="turma_id" class="form-select rounded-3" required>
            <option value="">Selecione uma turma</option>
            @foreach($turmas as $turma)
              <option value="{{ $turma->id }}" {{ $aluno->turma_id == $turma->id ? 'selected' : '' }}>
                {{ $turma->id }} - Ano: {{ $turma->ano }}
              </option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-warning">Atualizar</button>
        <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
</div>
@endsection
