<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\Categoria;
use DB;

class ProdutoController extends Controller
{
    
    function store(Request $request){

        $disponivel = 0;

        if($request->disponivel == "on"){
            $disponivel = 1;
        }

        $produto = new Produto();

        $produto->nome = $request->nome;

        $produto->descricao = $request->descricao;

        $produto->linkImagem = "";

        $produto->disponivel = $disponivel;

        $produto->preco = floatval($request->preco);

        $produto->idCategoria = $request->idCategoria;

        $produto->save();

        return redirect("/admin/produto/novo");

    }

    function update($id){
        $dados = DB::select("SELECT * FROM produtos WHERE id=$id");

        $categorias=Categoria::all();

        return view("admin/formularios/formularioProduto", ["dados"=>$dados[0], "categorias"=>$categorias]);

    }

}
