<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    function isLoged(){
        // $user = new User();
        // $user->name = "admin";
        // $user->password = Hash::make("admin");
        // $user->email = "email@gmail.com";
        // $user->save();
        if(!Auth::check()){
            return redirect("admin/login");
        }

        return view("admin/home");
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