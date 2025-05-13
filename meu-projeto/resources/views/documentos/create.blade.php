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
          <input type="text" name="descricao" id="descricao" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="horas_in" class="form-label">Horas</label>
          <input type="number" name="horas_in" id="horas_in" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="categoria_id" class="form-label">Categoria</label>
          <select name="categoria_id" class="form-select" required>
            <option value="">Selecione uma categoria</option>
            @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>

    </div>
  </div>
</div>
@endsection