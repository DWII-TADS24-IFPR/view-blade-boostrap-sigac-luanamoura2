<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentos = Documento::all();
        return view('documentos.index')->with('documentos', $documentos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $categorias = \App\Models\Categoria::all();
    return view('documentos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'descricao' => 'required|string',
        'horas_in' => 'required|numeric',
        'categoria_id' => 'required|exists:categorias,id',
        'url' => 'required|file|mimes:pdf|max:2048',
    ]);

    $file = $request->file('url');
    $filePath = $file->store('documentos', 'public');

    Documento::create([
        'descricao' => $request->descricao,
        'horas_in' => $request->horas_in,
        'categoria_id' => $request->categoria_id,
        'url' => $filePath,
        'status' => 'pendente', 
    ]);

    return redirect()->route('documentos.index')->with('success', 'Documento criado com sucesso!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $documento = Documento::findOrFail($id);
    return view('documentos.show', compact('documento'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $documento = Documento::findOrFail($id);
    $categorias = \App\Models\Categoria::all();
    return view('documentos.edit', compact('documento', 'categorias'));
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
