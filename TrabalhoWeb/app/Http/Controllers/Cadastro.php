<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Cadastro extends Controller
{
    public function index(){
        return view('LoginCadastro.cadastro');
    }

    
}
