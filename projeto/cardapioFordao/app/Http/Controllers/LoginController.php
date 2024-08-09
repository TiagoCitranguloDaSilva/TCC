<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    function isLoged(){
        if(!Auth::check()){
            return redirect("admin/login");
        }

        return view("admin/home");
    }

    function validar(Request $request){

        $request->validate([
            "name" => "required",
            "password" => "required"
        ],[
            "name.required" => "Este campo é obrigatório",
            "password.required" => "Este campo é obrigatório"
        ]);

        $validated = Auth::attempt(["name" => $request->name, "password" => $request->password]);
        
        if(!$validated){
            return redirect("/admin/login")->withErrors(["failedLogin" => "Usuário ou senha incorretos"]);
        }

        return redirect("/admin/home");

    }

    function logout(){
        Auth::logout();
        return redirect("admin/login");
    }


}
