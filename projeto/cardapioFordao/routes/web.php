<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\CategoriaController;

use App\Http\Controllers\ProdutoController;

use App\Http\Middleware\AdminMiddleware;


Route::redirect('/', "/home");

Route::get("/home", [ProdutoController::class, "showProducts"]);

Route::view('admin/login', '/admin/login');

Route::controller(LoginController::class)->group(function (){
        
    
    Route::post('admin/validar', 'validar');
    
    Route::any('admin/logout', 'logout');
    
});

Route::prefix("/admin")->middleware([AdminMiddleware::class])->group(function(){
    
    Route::redirect('/', "admin/login");
    
    Route::get('/home', [ProdutoController::class, "index"]);
    

    Route::prefix("/categoria")->group(function (){

        Route::view("/novo", "/admin/formularios/formularioCategoria");

        Route::post("/salvar", [CategoriaController::class, "store"]);
        
        Route::get("/update/{id}", [CategoriaController::class, "update"]);

        Route::put("/mudancas", [CategoriaController::class, "atualizar"]);

        Route::get("/excluir/{id}", [CategoriaController::class, "excluir"]);

        Route::get("/produtosCadastrados/{id}", [CategoriaController::class, "produtosCadastrados"]);

    });
    
    Route::prefix("/produto")->group(function (){
        
        Route::any("/novo", [CategoriaController::class, "index"]);
        
        Route::post("/salvar", [ProdutoController::class, "store"]);
        
        Route::get("/update/{id}", [ProdutoController::class, "update"]);
        
        Route::put("/mudancas", [ProdutoController::class, "atualizar"]);
        
        Route::get("/excluir/{id}", [ProdutoController::class, "excluir"]);

        Route::get("/show/{id}", [ProdutoController::class, "show"]);

    });

});