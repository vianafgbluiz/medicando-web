<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index()
    {
        $medicamentos = Medicamento::paginate(20);
        return view('medicamentos.index', compact('medicamentos'));
    }

    public function create()
    {
        return view('medicamentos.create');
    }

    public function store(Request $request)
    {
        if(isset($request) and !empty($request)) {
            $nome = $request->input('medic_nome');
            $preco = $request->input('medic_preco');

            $medicamento = new Medicamento();
            $medicamento->medic_nome = $nome;
            $medicamento->medic_preco = $preco;
            $medicamento->save();

            return redirect()->route('medicamento.index')->with('status', 'Medicamento criado!');
        }
        return response('Erro ao tentar cadastrar o medicamento!', 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicamento = Medicamento::find($id);
        if(isset($medicamento)) {
            return view('medicamentos.edit', compact('medicamento'));
        }

        return response('Medicamento não encontrado!', 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $medicamento = Medicamento::find($id);
        if(isset($medicamento)) {
            $nome = $request->input('medic_nome');
            $preco = $request->input('medic_preco');

            $medicamento->medic_nome = $nome;
            $medicamento->medic_preco = $preco;
            $medicamento->save();

            return redirect()->route('medicamento.index')->with('status', 'Medicamento editado!');
        }

        return response('Medicamento não encontrado!', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
