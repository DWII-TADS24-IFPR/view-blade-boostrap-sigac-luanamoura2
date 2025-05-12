<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

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
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
