@extends('layouts.app')

@section('title', 'Editar Documento')

@section('content')
<h1>Editar Documento</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('documentos.update', $documento->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" name="descricao" id="descricao" required>{{ old('descricao', $documento->descricao) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="horas_in" class="form-label">Horas</label>
        <input type="number" class="form-control" name="horas_in" id="horas_in" value="{{ old('horas_in', $documento->horas_in) }}" required>
    </div>

    <div class="mb-3">
        <label for="categoria_id" class="form-label">Categoria</label>
        <select class="form-select" name="categoria_id" id="categoria_id" required>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $documento->categoria_id == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="url" class="form-label">Substituir PDF (opcional)</label>
        <input type="file" class="form-control" name="url" id="url" accept="application/pdf">
        <small class="text-muted">PDF atual: <a href="{{ asset('storage/' . $documento->url) }}" target="_blank">Ver Arquivo</a></small>
    </div>

    <button type="submit" class="btn btn-warning">Atualizar</button>
    <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
