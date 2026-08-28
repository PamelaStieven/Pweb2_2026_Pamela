<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $dados = Cliente::All();

        return view('cliente.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('cliente.form');
    }


    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
        ], [
            'nome.required' => "O :attribute é obrigatorio",
            'email.required' => "O :attribute é obrigatorio",
            'telefone.required' => "O :attribute é obrigatorio"
        ]);
    }

    function store(Request $request)
    {
        //dd($request->all());
        $this->validateForm($request);

        Cliente::create($request->all());

        return redirect('cliente')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Cliente::find($id);

        // dd($data);
        //return view('cliente.form')->with(['data' => $data]);
        return view('cliente.form', compact('data'));
    }


    function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validateForm($request);

        Cliente::find($id)->update($request->all());

        return redirect('cliente')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        Cliente::destroy($id);

        return redirect('cliente')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Cliente::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Cliente::All();
        }

        return view('cliente.list', compact('dados'));
    }
}
