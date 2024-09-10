<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

use App\Models\Produto;

use DB;

class CategoriaController extends Controller
{

    function index(){
        return view("/admin/formularios/formularioProduto", ["categorias" => Categoria::all()]);
    }

    function store(Request $request){

        $request->validate([
            "nome" => "required|max:150"
        ],[
            "nome.required" => "Este campo é obrigatório",
            "nome.max" => "O tamanho máximo permitido é :max"
        ]);

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

    function update ($id) {

        $dados = DB::select("SELECT * FROM categorias WHERE id =$id");
        return view("admin/formularios/formularioCategoria", ["dados"=>$dados[0]]);

    }

    function atualizar(Request $request){

        $request->validate([
            "nome" => "required|max:150"
        ],[
            "nome.required" => "Este campo é obrigatório",
            "nome.max" => "O tamanho máximo permitido é :max"
        ]);

        $disponivel = 0;

        if($request->disponivel == "on"){
            $disponivel = 1;
        }

        DB::table("categorias")
            ->where("id", $request->id)
            ->update([
                "nome" => $request->nome,
                "disponivel" => $disponivel,
                "updated_at" => date("Y/m/d H:i:s")
            ]);


        return redirect("admin/");

    }

    function excluir($id){

        $exists = Categoria::findOrFail($id);

        if($exists){

            $query = db::select("SELECT * FROM produtos WHERE idCategoria = $id");

            // print_r($query);

            if(count($query) > 0){
                return back()->withErrors(["existemProdutos" => "Não foi possivel apagar, há produtos cadastrados nesta categoria"])->withInput();
            }

            db::table("categorias")
                ->where("id", $id)
                ->delete();
        }

        return redirect("/admin");

    }
}
