<?php

namespace App\Http\Controllers;
use App\Filme;

use Illuminate\Http\Request;

class Adm extends Controller
{
    public function index(){
        return view('addFilme');
    }

    public function add(Request $request){
        $dados = $request->all();
        Filme::create($dados);

        return redirect()->route('addFilme');
    }
}
