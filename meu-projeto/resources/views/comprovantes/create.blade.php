@extends('layouts.app')

@section('title', 'Novo Comprovante')

@section('content')
    <h1 class="my-4">Novo Comprovante</h1>

    <form action="{{ route('comprovantes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao') }}">
            @error('descricao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo (PDF ou imagem)</label>
            <input type="file" name="arquivo" id="arquivo" class="form-control">
            @error('arquivo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
