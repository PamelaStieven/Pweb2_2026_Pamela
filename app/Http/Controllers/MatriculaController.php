<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
   
    public function index()
    {
        $dados = Matricula::all();

        return view('matricula.list')->with(['dados' => $dados,]);
    }

    public function create()
    {
        $curso = Curso::ByOrderBy('nome')->get();
        $turma = Turma::ByOrderBy('nome')->get();
        $aluno = Aluno::ByOrderBy('nome')->get();

        return view('matricula.form')->with(compact('curso', 'turma', 'aluno'));
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'turma_id' => 'required|exists:turmas,id',
            'curso_id' => 'required|exists:cursos,id',
            'data_matricula' => 'required|date',
        ], [
            'aluno_id.required' => "O aluno é obrigatório",
            'turma_id.required' => "A turma é obrigatória",
            'curso_id.required' => "O curso é obrigatório",
            'data_matricula.required' => "A data de matrícula é obrigatória",
        ]);
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        $data = $request->all();

        Matricula::create($data);

        return redirect('matricula')->with("success", 'Registro inserido com sucesso!');
    }

    
    public function edit($id)
    {
        $data = Matricula::find($id);
        $curso = Curso::ByOrderBy('nome')->get();
        $turma = Turma::ByOrderBy('nome')->get();
        $aluno = Aluno::ByOrderBy('nome')->get();

        return view('matricula.form')->with(compact('data', 'curso', 'turma', 'aluno'));
    }

    
    public function update(Request $request,$id)
    {
        $this->validateForm($request);

        $data = $request->all();
        Matricula::find($id)->update($data);


        return redirect('matricula')->with("success", 'Registro atualizado com sucesso!');
    }

    public function destroy(Matricula $matricula)
    {
        //
    }
}
