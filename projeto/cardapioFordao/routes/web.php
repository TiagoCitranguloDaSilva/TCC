<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\CategoriaController;

use App\Http\Controllers\ProdutoController;


Route::redirect('/', "/admin/home");

Route::prefix("/admin")->group(function(){
    
    Route::redirect('/', "/admin/home");

    Route::view('/login', '/admin/login');

    
    Route::controller(LoginController::class)->group(function (){
        
        Route::any('/home', "isLoged");

        Route::post('/validar', 'validar');
        
        Route::any('/logout', 'logout');

    });

    Route::prefix("/categoria")->group(function (){

        Route::view("/novo", "/admin/formularios/formularioCategoria");

        Route::post("/salvar", [CategoriaController::class, "store"]);
        
        Route::get("/update/{id}", [CategoriaController::class, "update"]);

        Route::put("/mudancas", [CategoriaController::class, "atualizar"]);


    });

    Route::prefix("/produto")->group(function (){

        Route::any("/novo", [CategoriaController::class, "index"]);

        Route::post("/salvar", [ProdutoController::class, "store"]);
        
        Route::get("/update/{id}", [ProdutoController::class, "update"]);

        Route::put("/mudancas", [ProdutoController::class, "atualizar"]);

    });

});