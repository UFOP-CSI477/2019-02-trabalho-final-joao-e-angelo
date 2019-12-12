<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Filme;
use App\User;
use App\Lista;
use App\UserFilme;
use App\UserLista;
use App\ListaFilme;

class Principal extends Controller
{
    public function index(){
        return view('principal');
    }

    public function pesquisaFilme(Request $request){
        $pesquisa = $request->pesquisa;
        
        $filme = DB::table('filmes')
                ->select(DB::raw('*'))
                ->where('titulo', '=',  $pesquisa)
                ->get();
        
        return view('pesquisaFilmes', ['filme' => $filme]);
    }

    public function listas(){
 
        $listas = DB::select(DB::raw('select l.* 
        from listas l, users u, user_listas ul
        where u.id = ul.user_id and u.id =' .Auth::user()->id.'')); 
        
        return view('Listas.listas', ['listas' => $listas]);
    }

    public function listarFilmesLista(Request $request){
        // $l->listaId = $request->all();
        $filmesDaLista = DB::select(DB::raw('select f.titulo, f.genero, f.cIndicativa
        from listas l, users u, user_listas ul, lista_filmes lf, filmes f
        where  u.id = '.Auth::user()->id.' and u.id = ul.user_id and l.listaId = 1 and l.listaId = lf.lista_id and f.filmeId = lf.filme_id '));
        
        return view('Listas.filmesDaLista', ['filmesDaLista' =>$filmesDaLista]);
    }
}
