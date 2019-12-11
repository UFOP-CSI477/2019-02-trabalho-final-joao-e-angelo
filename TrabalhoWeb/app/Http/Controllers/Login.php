<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function index(){
        return view('LoginCadastro.login');
    }

    public function entrar(Request $req){
        $dados = $req->all();
        if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])){
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }

    public function sair(){
        Auth::logout();
        return redirect()->route('site.home');
    }
}
