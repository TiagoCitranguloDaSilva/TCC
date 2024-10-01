<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

use App\Models\Produto;

use App\Http\Controllers\ProdutoController;

use DB;

use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{

    function index(){
        return view("/admin/formularios/formularioProduto", ["categorias" => Categoria::all()]);
    }

    function store(Request $request){
        
    

        $validator = Validator::make($request->all(), [
            "nome" => "required|max:150"
        ],[
            "nome.required" => "Este campo é obrigatório",
            "nome.max" => "O tamanho máximo permitido é :max"
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        $disponivel = 0;

        if($request->disponivel == "on"){
            $disponivel = 1;
        }

        $categoria = new Categoria();

        $categoria->nome = $request->nome;

        $categoria->disponivel = $disponivel;

        $categoria->save();

        return redirect("/admin/categoria/novo")->with("mensagemSucesso", "Categoria cadastrada com sucesso!");

    }

    function update ($id) {
        $exists = Categoria::find($id);
        if($exists == null){
            return redirect()->back();
        }  
        
        $dados = DB::select("SELECT * FROM categorias WHERE id =$id");
        return view("admin/formularios/formularioCategoria", ["dados"=>$dados[0]]);

    }

    function atualizar(Request $request){

        $exists = Categoria::find($request->id);
        if($exists == null){
            return redirect()->back();
        }
        

        $validator = Validator::make($request->all(), [
            "nome" => "required|max:150"
        ],[
            "nome.required" => "Este campo é obrigatório",
            "nome.max" => "O tamanho máximo permitido é :max"
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

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


        return redirect("admin/home")->with("mensagemSucesso", "Categoria atualizada com sucesso!");

    }

    function excluir($id){

        $exists = Categoria::find($id);

        if($exists != null){

            $produtoController = new ProdutoController();

            
            foreach (DB::select("SELECT id FROM produtos WHERE idCategoria = $id") as $idProduto) {

                $produtoController->excluir($idProduto->id);
                
            }

            db::table("categorias")
                ->where("id", $id)
                ->delete();
        }

        return redirect("admin/home")->with("mensagemSucesso", "Categoria apagada com sucesso!");

    }

    function produtosCadastrados($id){

        return response()->json(sizeof(DB::select("SELECT nome FROM produtos WHERE idCategoria = $id")));
        
    }

    function pegarCategoriasDisponiveis(){
        return db::select("SELECT * FROM categorias WHERE disponivel = 1 ORDER BY nome");
    }

    function getAll(){
        return Categoria::all();
    }
}
