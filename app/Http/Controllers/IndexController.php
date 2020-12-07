<?php

namespace App\Http\Controllers;
use App\Models\Departamento;
use App\Models\Marca;
use App\Models\Produto;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
       
        return view('index');
        //metodo de chamar a view

    }
}
