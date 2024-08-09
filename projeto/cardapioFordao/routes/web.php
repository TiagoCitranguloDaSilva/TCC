<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

Route::redirect('/', "/admin/home");

Route::prefix("/admin")->group(function(){
    
    Route::view('/login', 'admin/login');

    
    Route::controller(LoginController::class)->group(function (){
        
        Route::any('/home', "isLoged");

        Route::post('/validar', 'validar');
        
        Route::any('/logout', 'logout');

    });

});