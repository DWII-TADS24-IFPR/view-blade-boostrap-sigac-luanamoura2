@extends('layouts.app')

@section('title', 'Adicionar Documento')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Adicionar Documento</h4>
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

      <form action="{{ route('documentos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <textarea class="form-control rounded-3" id="descricao" name="descricao" rows="3" required>{{ old('descricao') }}</textarea>
        </div>

        <div class="mb-3">
          <label for="horas_in" class="form-label">Horas Solicitadas</label>
          <input type="number" step="0.1" class="form-control rounded-3" id="horas_in" name="horas_in" required value="{{ old('horas_in') }}">
        </div>

        <div class="mb-3">
          <label for="categoria_id" class="form-label">Categoria</label>
          <select class="form-select rounded-3" id="categoria_id" name="categoria_id" required>
            <option value="">Selecione uma categoria</option>
            @foreach ($categorias as $categoria)
              <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nome }}
              </option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Salvar
        </button>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection
