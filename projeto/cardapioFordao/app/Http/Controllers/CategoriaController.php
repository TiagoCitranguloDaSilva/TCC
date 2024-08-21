<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

use DB;

class CategoriaController extends Controller
{

    function index(){
        return view("/admin/formularios/formularioProduto", ["categorias" => Categoria::all()]);
    }

    function store(Request $request){

        $disponivel = 0;

        if($request->disponivel == "on"){
            $disponivel = 1;
        }

        $categoria = new Categoria();

        $categoria->nome = $request->nome;

        $categoria->disponivel = $disponivel;

        $categoria->save();

        return redirect("/admin/categoria/novo");

    }
}
