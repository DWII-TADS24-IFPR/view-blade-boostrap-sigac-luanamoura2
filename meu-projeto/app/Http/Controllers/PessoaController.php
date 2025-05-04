<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pessoas = Pessoa::all(); // Buscar todas as pessoas no banco.
        return view('pessoas.index')->with('pessoas', $pessoas); // Enviar esses dados para a view pessoas.index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pessoas.create'); //retorna view pessoas.create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nome = $request->nome;
        $idade = $request->idade;
        $cpf = $request->cpf;

        $pessoa = new Pessoa();
        $pessoa->nome = $nome;
        $pessoa->idade = $idade;
        $pessoa->cpf = $cpf;
        $pessoa->save();

        return redirect()->route('pessoas.index');
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
        return view("pessoas.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pessoa = Pessoa::find($id);

        if (isset($pessoa)){
            $pessoa->nome = $request->nome;
            $pessoa->idade = $request->idade;
            $pessoa->cpf = $request->cpf;

            $pessoa->save();

            return redirect()->route('pessoas.index');
        }

        return redirect()->route('pessoas.error');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pessoa = Pessoa::find($id);

        if (isset($pessoas)) {
            $pessoa->delete();
            return '<h1>Registro excluído</h1>';
        }

        return '<h1>Não excluído</h1>';
    }
}
