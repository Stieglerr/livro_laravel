<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
{
    $livros = Livro::paginate(10);
    return view('livros.index', compact('livros'));
}


    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'isbn' => 'required|unique:livros',
            'editora' => 'required',
            'ano_publicacao' => 'required|digits:4'
        ]);

        Livro::create($validatedData);

        return redirect()->route('livros.index')->with('success', 'Livro adicionado com sucesso.');
    }

    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, Livro $livro)
    {
        $validatedData = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'isbn' => 'required|unique:livros,isbn,' . $livro->id,
            'editora' => 'required',
            'ano_publicacao' => 'required|digits:4'
        ]);

        $livro->update($validatedData);

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro removido com sucesso.');
    }
}
