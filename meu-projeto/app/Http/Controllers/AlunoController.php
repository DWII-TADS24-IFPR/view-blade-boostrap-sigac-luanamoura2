<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Nivel;


class AlunoController extends Controller
{
   
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index')->with('alunos', $alunos);
    }

        public function create()
    {
        $cursos = Curso::all();   
        $turmas = Turma::all();
        $nivels = Nivel::all(); 
        return view('alunos.create', compact('cursos', 'turmas', 'nivels')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14', 
            'email' => 'required|string|email|max:255|unique:alunos',
            'senha' => 'required|string|max:255',
            'turma_id' => 'required|exists:turmas,id', 
        ]);

        Aluno::create($request->all());

        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso.');
    }

   
    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.show')->with('aluno', $aluno);
    }

   
    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit')->with('aluno', $aluno);
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:alunos,email,' . $id,
            'telefone' => 'required|string|max:15',
        ]);

        $aluno = Aluno::findOrFail($id);
        $aluno->update($request->all());

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso.');
    }

   
    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso.');
    }
}
