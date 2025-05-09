@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Adicionar Curso</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nome" class="form-label">Nome do Curso</label>
          <input type="text" class="form-control rounded-3" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
          <label for="carga_horaria" class="form-label">Carga Horária</label>
          <input type="number" class="form-control rounded-3" id="carga_horaria" name="carga_horaria" required>
        </div>
        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Salvar
        </button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection
