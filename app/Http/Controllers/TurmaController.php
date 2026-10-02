<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index(Curso $curso)
    {
        $dados = $curso->turmas;

        return view('turma.list')->with([
            'dados' => $dados,
            'curso' => $curso,
        ]);
    }

    public function create(Curso $curso)
    {
        return view('turma.form')->with(compact('curso'));
    }

    public function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'curso_id' => 'required|exists:cursos,id',
        ], [
            'nome.required' => "O campo :attribute é obrigatório",
            'curso_id.required' => "O curso é obrigatório",
        ]);
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        $data = $request->all();

        Turma::create($data);

        return redirect()->route('curso.turmas', $request->curso_id)->with("success", 'Registro inserido com sucesso!');
    }

    public function edit($id)
    {
        $data = Turma::findOrFail($id);
        $curso = Curso::findOrFail($data->curso_id);

        return view('turma.form')->with(compact('data', 'curso'));
    }

    public function update(Request $request, $id)
    {
        $this->validateForm($request);

        $data = $request->all();

        Turma::find($id)->update($data);

        return redirect()->route('curso.turmas', $request->curso_id)->with("success", 'Registro atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $data = Turma::find($id);

        Turma::destroy($id);

        return redirect()->route('curso.turmas', $data->curso_id)->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        $curso = Curso::findOrFail($request->curso_id);

        if (!empty($request->valor)) {
            $dados = Turma::where('curso_id', $curso->id)
                ->where($request->tipo, 'like', "%{$request->valor}%")
                ->get();
        } else {
            $dados = $curso->turmas;
        }

        return view('turma.list', compact('dados', 'curso'));
    }
}