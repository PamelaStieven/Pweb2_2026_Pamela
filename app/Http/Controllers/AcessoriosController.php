<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acessorios;

class AcessoriosController extends Controller
{
    public function index()
    {
        $dados = Acessorios::All();

        return view('acessorios.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('acessorios.form');
    }


    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'categoria' => 'required',
            'preco' => 'required',
        ], [
            'nome.required' => "O :attribute é obrigatorio",
            'categoria.required' => "O :attribute é obrigatorio",
            'preco.required' => "O :attribute é obrigatorio"
        ]);
    }

    function store(Request $request)
    {
        //dd($request->all());
        $this->validateForm($request);

        Acessorios::create($request->all());

        return redirect('acessorios')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Acessorios::find($id);

        // dd($data);
        //return view('aluno.form')->with(['data' => $data]);
        return view('acessorios.form', compact('data'));
    }


    function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validateForm($request);

        Acessorios::find($id)->update($request->all());

        return redirect('acessorios')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        Acessorios::destroy($id);

        return redirect('acessorios')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Acessorios::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Acessorios::All();
        }

        return view('acessorios.list', compact('dados'));
    }
}
