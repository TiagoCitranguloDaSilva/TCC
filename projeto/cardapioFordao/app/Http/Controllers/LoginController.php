<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Categoria;
use App\Models\Produto;
use DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    function isLoged(){
        if(!Auth::check()){
            return redirect("admin/login");
        }

        
    }


    function validar(Request $request){

        $request->validate([
            "username" => "required",
            "password" => "required"
        ],[
            "username.required" => "Este campo é obrigatório",
            "password.required" => "Este campo é obrigatório"
        ]);

        $validated = Auth::attempt(["name" => $request->username, "password" => $request->password]);
        
        if(!$validated){
            return view("/admin/erroLogin");
        }

            return redirect("/admin/home");

    }

    function logout(){
        Auth::logout();
        return redirect("admin/login");
    }


}
