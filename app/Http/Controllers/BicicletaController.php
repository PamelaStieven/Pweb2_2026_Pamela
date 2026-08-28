<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicicleta;

class BicicletaController extends Controller
{
    public function index()
    {
        $dados = Bicicleta::All();

        return view('bicicleta.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('bicicleta.form');
    }


    function validateForm(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'preco' => 'required',
        ], [
            'marca.required' => "O :attribute é obrigatorio",
            'modelo.required' => "O :attribute é obrigatorio",
            'preco.required' => "O :attribute é obrigatorio"
        ]);
    }

    function store(Request $request)
    {
        //dd($request->all());
        $this->validateForm($request);

        Bicicleta::create($request->all());

        return redirect('bicicleta')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Bicicleta::find($id);

        // dd($data);
        //return view('aluno.form')->with(['data' => $data]);
        return view('bicicleta.form', compact('data'));
    }


    function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validateForm($request);

        Bicicleta::find($id)->update($request->all());

        return redirect('bicicleta')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        Bicicleta::destroy($id);

        return redirect('bicicleta')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Bicicleta::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Bicicleta::All();
        }

        return view('bicicleta.list', compact('dados'));
    }
}
