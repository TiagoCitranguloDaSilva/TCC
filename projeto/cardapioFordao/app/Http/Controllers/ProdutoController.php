<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\Categoria;
use DB;

class ProdutoController extends Controller
{
    
    function store(Request $request){

        $request->validate([
            "nome" => "required|max:150",
            "descricao" => "required|max:500",
            // "linkImagem" => "required",
            "preco" => "numeric|required|max:999",
            "idCategoria" => "required"
        ], [
            "nome.required" => "Este campo é obrigatório",
            "nome.max" => "O tamanho máximo permitido é :max",
            "descricao.required" => "Este campo é obrigatório",
            "descricao.max" => "O tamanho máximo permitido é :max",
            "preco.required" => "Este campo é obrigatório",
            "preco.max" => "Valor muito alto",
            "preco.numeric" => "Digite um número válido",
            "idCategoria" => "Este campo é obrigatório"
        ]);

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

    function atualizar(Request $request){

        $disponivel = 0;

        if($request->disponivel == 1){
            $disponivel = 1;
        }

        DB::table("produtos")
            ->where("id", $request->id)
            ->update([
                "nome" => $request->nome,
                "disponivel" => $disponivel,
                "linkImagem" => "",
                "descricao" => $request->descricao,
                "preco" => $request->preco,
                "idCategoria" => $request->idCategoria,
                "updated_at" => date("Y/m/d H:i:s")
            ]);

        return redirect("/admin");

    }

}
