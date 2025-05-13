@extends('layouts.app')

@section('title', 'Detalhes da Declaração')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detalhes da Declaração</h4>
        </div>
        <div class="card-body">
            <h1 class="mb-4">Informações da Declaração</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Texto</th>
                        <th>Data</th>
                        <th>Comprovante</th>
                        <th>Aluno</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $declaracao->tipo }}</td>
                        <td><pre class="mb-0">{{ $declaracao->texto }}</pre></td>
                        <td>{{ $declaracao->data }}</td>
                        <td>{{ $declaracao->comprovante->atividade ?? 'N/A' }}</td>
                        <td>{{ $declaracao->aluno->nome ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('declaracoes.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
                <div>
                    <a href="{{ route('declaracoes.edit', $declaracao->id) }}" class="btn btn-warning me-2">
                        <i class="bi bi-pencil"></i> Editar
                    </a>

                    <form action="{{ route('declaracoes.destroy', $declaracao->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta declaração?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
