<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categorias = Categoria::with('curso')->get();
        return view('categorias.index', compact('categorias'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = \App\Models\Curso::all();
        return view('categorias.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias',
            'max_horas' => 'required|numeric|min:0',
            'curso_id' => 'required|exists:cursos,id',
        ]);


        Categoria::create([
            'nome' => $request->nome,
            'max_horas' => $request->max_horas,
            'curso_id' => $request->curso_id,
        ]);


        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
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
