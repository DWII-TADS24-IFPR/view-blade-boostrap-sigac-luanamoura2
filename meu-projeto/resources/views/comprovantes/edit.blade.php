@extends('layouts.app')

@section('title', 'Editar Comprovante')

@section('content')
    <h1 class="my-4">Editar Comprovante</h1>

    <form action="{{ route('comprovantes.update', $comprovante->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao', $comprovante->descricao) }}">
            @error('descricao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="arquivo" class="form-label">Substituir Arquivo (opcional)</label>
            <input type="file" name="arquivo" id="arquivo" class="form-control">
            @error('arquivo')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            @if ($comprovante->arquivo)
                <p class="mt-2">Arquivo atual: <a href="{{ asset('storage/' . $comprovante->arquivo) }}" target="_blank">Ver</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
