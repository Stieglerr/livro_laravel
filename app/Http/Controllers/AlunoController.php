<?php

namespace App\Http\Controllers;
use App\Models\Aluno;
use Illuminate\Http\Request;


class AlunoController extends Controller
{
    public function index(){
        $alunos = Aluno::paginate(10);
        return view('alunos.index', compact('alunos'));
    }
    public function create(){
        return view('alunos.create');
    }
    public function store(Request $request){
        Aluno::create($request->all());
        return redirect()->route('alunos.index');
    }
    public function edit(Aluno $aluno){
        return view('aluno.edit', compact('aluno'));
    }
    public function update(Request $request, Aluno $aluno){
        $Aluno->update($request->all());
        return redirect()->route('alunos.index');
    }
    public function destroy(Aluno $aluno){
        $aluno->delete();
        return redirect()->route('alunos.index');
    }
}
