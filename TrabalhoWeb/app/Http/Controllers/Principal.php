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
        
        $lista = DB::select(DB::raw('select * from listas'));
        
        return view('pesquisaFilmes', ['filme' => $filme], ['lista' => $lista]);
    }

    public function listas(){
 
        $listas = DB::select(DB::raw('select l.* 
        from listas l, users u, user_listas ul
        where u.id = ul.user_id and u.id =' .Auth::user()->id.'')); 
        
        return view('Listas.listas', ['listas' => $listas]);
    }

    public function listarFilmesLista($listaId){
        
        $filmesDaLista = DB::select(DB::raw('select f.filmeId, f.titulo, f.genero, f.cIndicativa
        from listas l, users u, user_listas ul, lista_filmes lf, filmes f
        where  u.id = '.Auth::user()->id.' and u.id = ul.user_id and l.listaId = '.$listaId.' and l.listaId = lf.lista_id and f.filmeId = lf.filme_id '));
        
        return view('Listas.filmesDaLista', ['filmesDaLista' =>$filmesDaLista]);
    }

    public function deletarDaLista($filmeId){
        
        DB::table('lista_filmes')->where('filme_id', '=', $filmeId)->delete();

        return redirect()->route('listas');
    }

    public function addNaLista(Request $request, $dados){
        $lf = new ListaFilme;
        $lf->listaId = $request->listaId;
        $lf->filmeId = $dados;
        
        DB::insert('insert into lista_filmes (lista_id, filme_id) values ('.$lf->listaId.', '.$lf->filmeId.')');
        return redirect()->route('listas');
    }

    public function avaliar(){
        return view('avaliacaoDeFilmes');
    }

}
