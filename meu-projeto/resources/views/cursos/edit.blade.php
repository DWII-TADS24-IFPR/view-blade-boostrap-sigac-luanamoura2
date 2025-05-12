@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
<h1 class="my-4">Editar Curso</h1>

<form action="{{ route('cursos.update', $curso->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $curso->nome) }}">
        @error('nome') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

      <div class="mb-3">
        <label for="carga_horaria" class="form-label">Carga Horária</label>
        <input type="number" name="carga_horaria" id="carga_horaria" class="form-control" value="{{ old('carga_horaria', $curso->carga_horaria) }}">
        @error('carga_horaria') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label for="turma_id" class="form-label">Turma</label>
        <select name="turma_id" id="turma_id" class="form-control">
            @foreach($turmas as $turma)
                <option value="{{ $turma->id }}" {{ $curso->turma_id == $turma->id ? 'selected' : '' }}>
                    {{ $turma->nome }}
                </option>
            @endforeach
        </select>
        @error('turma_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
