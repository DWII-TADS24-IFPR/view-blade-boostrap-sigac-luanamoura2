<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Turma;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index')->with('cursos', $cursos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'carga_horaria' => 'required|numeric|min:1',
        ]);

        Curso::create([
            'nome' => $request->nome,
            'carga_horaria' => $request->carga_horaria,
        ]);

         return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $curso = Curso::findOrFail($id); 
         $turmas = Turma::all(); 
        return view('cursos.edit', compact('curso', 'turmas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $request->validate([
        'nome' => 'required|string|max:255',
        'carga_horaria' => 'required|integer|min:1',
    ]);

    $curso = Curso::findOrFail($id);
    $curso->nome = $request->nome;
    $curso->carga_horaria = $request->carga_horaria;
    
    $curso->save();

    return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $curso = Curso::findOrFail($id);
    $curso->delete();

    return redirect()->route('cursos.index')->with('success', 'Curso excluído com sucesso!');
    }
}
