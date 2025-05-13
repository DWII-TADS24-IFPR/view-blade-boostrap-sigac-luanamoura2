<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Declaracao;
use App\Models\Aluno;
use App\Models\Comprovante;

class DeclaracaoController extends Controller
{

    public function index()
    {
        $declaracoes = Declaracao::with('comprovante')->get();
        return view('declaracoes.index', compact('declaracoes'));
    }

    public function create()
    {
        $comprovantes = Comprovante::all();
        $alunos = Aluno::all(); 
        return view('declaracoes.create', compact('comprovantes', 'alunos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'comprovante_id' => 'required|exists:comprovantes,id',
        ]);

        Declaracao::create([
            'hash' => bin2hex(random_bytes(10)),
            'data' => now(),
            'aluno_id' => $request->aluno_id,
            'comprovante_id' => $request->comprovante_id,
        ]);

        return redirect()->route('declaracoes.index')->with('success', 'Declaração criada com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
        $declaracao = Declaracao::with(['comprovante', 'aluno'])->findOrFail($id);

        
        if (!$declaracao) {
            return redirect()->route('declaracoes.index')->with('error', 'Declaração não encontrada.');
        }

        return view('declaracoes.show', compact('declaracao'));
    }
   
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
