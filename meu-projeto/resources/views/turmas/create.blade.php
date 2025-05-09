@extends('layouts.app')

@section('title', 'Adicionar Turma')

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Adicionar Turma</h4>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs mb-3" id="turmaTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="dados-tab" data-bs-toggle="tab" data-bs-target="#dados" type="button" role="tab">Dados da Turma</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="periodo-tab" data-bs-toggle="tab" data-bs-target="#periodo" type="button" role="tab">Período</button>
                </li>
            </ul>

            <form action="{{ route('turmas.store') }}" method="POST">
                @csrf
                <div class="tab-content" id="turmaTabContent">
                    <!-- Aba: Dados da Turma -->
                    <div class="tab-pane fade show active" id="dados" role="tabpanel">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome da Turma</label>
                            <input type="text" class="form-control" name="nome" id="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="curso" class="form-label">Curso</label>
                            <input type="text" class="form-control" name="curso" id="curso" required>
                        </div>
                        <div class="mb-3">
                           
                           
                        </div>
                    </div>

                    <!-- Aba: Período -->
                    <div class="tab-pane fade" id="periodo" role="tabpanel">
                        <div class="mb-3">
                            <label for="inicio" class="form-label">Início</label>
                            <input type="date" class="form-control" name="inicio" id="inicio" required>
                        </div>
                        <div class="mb-3">
                            <label for="fim" class="form-label">Fim</label>
                            <input type="date" class="form-control" name="fim" id="fim" required>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                   <button type="submit" class="btn btn-success">
                     <i class="bi bi-check-circle"></i> Salvar
                        </button>
                    <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
