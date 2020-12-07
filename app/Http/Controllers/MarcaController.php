<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('marcas.index', compact(['marcas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [ 'nome' => 'required|min:2|unique:marcas' ], 
            [
              "nome.min"    => "A marca deve ter no mínimo 2 letras.",
              "nome.unique" => "Marca já cadastrada.",
            ]
        );
        $marca = new Marca();
        $marca->nome = $request->nome;
        $marca->save();
        return redirect()->route('marcas.index')
            ->with('msg_success', 'Marca criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        $produtos = $marca->produtos;
        return view('marcas.show', 
            compact(['marca', 'produtos']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        return view('marcas.edit', 
            compact(['marca']) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        $request->validate(
            [
                'nome' => [
                    'required', 
                    'min:2', 
                    Rule::unique('marcas')->ignore($marca->id)
                ]
            ],
            [
                "nome.min"    => "A marca deve ter no mínimo 2 letras.",
                "nome.unique" => "Marca já cadastrada.",
            ]            
        );

        $marca->nome = $request->nome;
        $marca->save();

        return redirect()->route('marcas.index')
            ->with('msg_success', 'Marca atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        $marca->delete();

        return redirect()->route('marcas.index')
            ->with('msg_success', 'Marca removida com sucesso.');
    }
}