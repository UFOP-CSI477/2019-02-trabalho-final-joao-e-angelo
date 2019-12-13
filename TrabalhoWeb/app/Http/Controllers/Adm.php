<?php

namespace App\Http\Controllers;
use App\Filme;
use App\UserFilme;

use Illuminate\Http\Request;

class Adm extends Controller
{
    public function index(){
        return view('addFilme');
    }

    public function add(Request $request){
        $dados = $request->all();
        Filme::create($dados);
        //User::


        return redirect()->route('addFilme');
    }
}
