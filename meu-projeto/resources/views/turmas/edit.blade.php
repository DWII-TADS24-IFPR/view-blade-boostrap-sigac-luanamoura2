@extends('layouts.app')

@section('title', 'Editar Turma')

@section('content')
<h1 class="my-4">Editar Turma</h1>

<form action="{{ route('turmas.update', $turma->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="ano" class="form-label">Ano</label>
        <input type="text" name="ano" id="ano" class="form-control" value="{{ old('ano', $turma->ano) }}">
        @error('ano') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label for="nivel_id" class="form-label">Nível</label>
        <select name="nivel_id" id="nivel_id" class="form-select">
            @foreach ($niveis as $nivel)
                <option value="{{ $nivel->id }}" {{ $turma->nivel_id == $nivel->id ? 'selected' : '' }}>
                    {{ $nivel->nome }}
                </option>
            @endforeach
        </select>
        @error('nivel_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
