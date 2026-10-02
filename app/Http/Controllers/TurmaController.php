<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $dados = Turma::All();

        return view('turma.list')->with(['dados' => $dados]);
    }

    function create()
    {
        $cursos = Curso::orderBy('nome')->get();

        return view('turma.form')->with(compact('cursos'));
    }


    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'curso_id' => 'required',
        ], [
            'nome.required' => "O :attribute é obrigatorio",
            'curso_id.required' => "O :attribute é obrigatorio",
        ]);
    }

    function store(Request $request)
    {
        //dd($request->all());
        $this->validateForm($request);

        $data = $request->all();

        Turma::create($data);

        return redirect('turma')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Turma::find($id);
        $cursos = Curso::orderBy('nome')->get();

        // dd($categorias);
        return view('turma.form')->with(compact('data', 'cursos'));
    }


    function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validateForm($request);

        $data = $request->all();

        Turma::find($id)->update($data);

        return redirect('turma')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        Turma::destroy($id);

        return redirect('turma')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Turma::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Turma::All();
        }

        return view('turma.list', compact('dados'));
    }
}
