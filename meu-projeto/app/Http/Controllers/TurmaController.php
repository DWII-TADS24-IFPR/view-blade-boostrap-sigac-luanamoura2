<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Nivel;

class TurmaController extends Controller
{
    
    
    public function index()
    {
       
        $turmas = Turma::all();

       
        foreach ($turmas as $turma) {
            $turma->periodo = $turma->inicio . ' até ' . $turma->fim;
        }

        return view('turmas.index', compact('turmas'));
    }


    
    public function create()
    {
        $cursos = \App\Models\Curso::all();  
        return view('turmas.create', compact('cursos'));  
    }
    public function store(Request $request)
    {
       
        $request->validate([
            'nome' => 'required|string|max:255',
            'curso_id' => 'required|exists:cursos,id', 
            'ano' => 'required|integer', 
            'inicio' => 'required|date',
            'fim' => 'required|date',
        ]);
    
      
        Turma::create([
            'nome' => $request->nome,
            'curso_id' => $request->curso_id,
            'ano' => $request->ano,  
            'inicio' => $request->inicio,
            'fim' => $request->fim,
        ]);
    
        return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso!');
    }
    
    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $turma = Turma::findOrFail($id);
        $niveis = Nivel::all();
    return view('turmas.edit', compact('turma', 'niveis'));
    }

    
   public function update(Request $request, $id)
    {
    $request->validate([
        'nome' => 'required|string|max:255',
        'nivel_id' => 'required|exists:nivels,id',
    ]);

    $turma = Turma::findOrFail($id);
    $turma->nome = $request->nome;
    $turma->nivel_id = $request->nivel_id;
    $turma->save();

    return redirect()->route('turmas.index')->with('success', 'Turma atualizada com sucesso!');
    }

    
    public function destroy(string $id)
    {
        //
    }
}
