<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;

use App\Models\Produto;
use App\Models\Categoria;
use DB;

use Carbon\Carbon;

use Carbon\Exceptions\InvalidFormatException;

class ProdutoController extends Controller
{
    
    function store(Request $request){

        $validator = Validator::make($request->all(), [
            "nome" => "required|max:150",
            "descricao" => "required|max:500",
            "image" => "required",
            "preco" => "numeric|required|max:999",
            "idCategoria" => "required"
        ], [
            "nome.required" => "Este campo é obrigatório",
            "nome.max" => "O tamanho máximo permitido é :max",
            "descricao.required" => "Este campo é obrigatório",
            "descricao.max" => "O tamanho máximo permitido é :max",
            "image.required" => "Este campo é obrigatório",
            "preco.required" => "Este campo é obrigatório",
            "preco.max" => "O valor máximo permitido é R$ :max",
            "preco.numeric" => "Digite um número válido",
            "idCategoria" => "Este campo é obrigatório"
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

        $produto = new Produto();

        $produto->nome = $request->nome;

        $produto->descricao = $request->descricao;

        
        $produto->disponivel = $disponivel;
        
        $produto->preco = floatval($request->preco);
        
        $produto->idCategoria = $request->idCategoria;

        if(!file_exists(public_path("pictures"))){
            mkdir(public_path('pictures'), 0777, false);
        }

        $path = "pictures/" . date("YmdHis") . "." . "jpg";
        
        move_uploaded_file($_FILES['image']['tmp_name'], public_path($path));
        
        $produto->linkImagem = $path;

        $produto->save();

        return redirect("/admin/produto/novo")->with("mensagemSucesso", "Produto cadastrado com sucesso!");

    }

    function update($id){

        $exists = Produto::find($id);
        if($exists == null){
            return redirect()->back();
        }  
        
        $dados = DB::select("SELECT * FROM produtos WHERE id=$id");

        $categorias=Categoria::all();

        $dataOriginal = $dados[0]->updated_at;

        $data = Carbon::parse($dataOriginal);

        $dataConvertida = $data->format('d/m/Y H:i:s');

        $dados[0]->updated_at = $dataConvertida;
        

        return view("admin/formularios/formularioProduto", ["dados"=>$dados[0], "categorias"=>$categorias]);

    }

    function atualizar(Request $request){

        $exists = Produto::find($request->id);
        if($exists == null){
            return redirect()->back();
        }  

        $path;

        if(isset($request->linkImagem)){
            
            
            $linkImagem = db::select("SELECT linkImagem from produtos WHERE id = " . $request->id);
            if (file_exists(public_path($linkImagem[0]->linkImagem))) {
                unlink(public_path($linkImagem[0]->linkImagem));
            }
            $path = "pictures/" . date("YmdHis") . "." . "jpg";
            move_uploaded_file($_FILES['link']['tmp_name'], public_path($path));
        }else{
            $temp = db::select("SELECT linkImagem from produtos WHERE id = " . $request->id);
            $path = $temp[0]->linkImagem;
        }


        

        $disponivel = 0;

        if($request->disponivel == "on"){
            $disponivel = 1;
        }

        DB::table("produtos")
            ->where("id", $request->id)
            ->update([
                "nome" => $request->nome,
                "disponivel" => $disponivel,
                "linkImagem" => $path,
                "descricao" => $request->descricao,
                "preco" => $request->preco,
                "idCategoria" => $request->idCategoria,
                "updated_at" => date("Y/m/d H:i:s")
            ]);

        return redirect("/admin/home")->with("mensagemSucesso", "Produto atualizado com sucesso!");

    }

    function excluir($id, $porController = false){

        $exists = Produto::find($id);

        if($exists != null){

            $linkImagem = db::select("SELECT linkImagem from produtos WHERE id = " . $id);


            if (file_exists(public_path($linkImagem[0]->linkImagem))) {
                unlink(public_path($linkImagem[0]->linkImagem));
            }

            db::table("produtos")
                ->where("id", $id)
                ->delete();
        }

        if(!$porController){
            return redirect("admin/home")->with("mensagemSucesso", "Produto apagado com sucesso!");
        }


    }

    function show($id){

        $exists = Produto::find($id);

        
        
        if($exists){
            $exists->linkImagem = asset($exists->linkImagem);
            return response()->json($exists);
        }

    }

}
