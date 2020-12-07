<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Departamento;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact(['produtos']));

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        $departamentos = Departamento::all();
        return view('produtos.create', compact(['marcas', 'departamentos']));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->estoque = $request->estoque;
        $produto->marca_id = $request->marca;
        $produto->save();

        return redirect()->route('produtos.index')
            ->with('msg_success', 'Produto criado com sucesso.');
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        $marcas = Marca::all();
        $produtos = $produto->produtos;
        return view('produtos.show', 
            compact(['produto', 'marcas']));

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {

        return view('produtos.edit', 
            compact(['produto']) );
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate(
            [
                'nome' => [
                    'required', 
                    'min:2', 
                    Rule::unique('produtos')->ignore($produto->id)
                ]
            ],
            [
                "nome.min"    => "A marca deve ter no mínimo 4 letras.",
                "nome.unique" => "produto já cadastrada.",
            ]            
        );

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->estoque = $request->estoque;
        $produto->save();

        return redirect()->route('produtos.index')
            ->with('msg_success', 'produtos atualizada com sucesso.');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {    
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('msg_success', 'produto removido com sucesso.');

        //
    }
}
