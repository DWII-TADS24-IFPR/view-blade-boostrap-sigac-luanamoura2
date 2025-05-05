@extends('layouts.app')

@section('title', 'Novo Curso')

@section('content')
    <h1 class="my-4">Novo Curso</h1>

    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Curso</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}">
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="carga_horaria" class="form-label">Carga Horária (horas)</label>
            <input type="number" name="carga_horaria" id="carga_horaria" class="form-control" value="{{ old('carga_horaria') }}">
            @error('carga_horaria')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
