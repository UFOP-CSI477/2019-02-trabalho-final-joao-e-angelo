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

        $temAva = DB::select(DB::raw('select f.filmeId 
        from filmes f, user_filmes uf
        where f.filmeID = uf.filme_id and f.titulo ="'.$pesquisa.'"'));
        
        if($temAva == null){
            $filme = DB::table('filmes')
                    ->select(DB::raw('*'))
                    ->where('titulo', '=',  $pesquisa)
                    ->get();
            $lista = DB::select(DB::raw('select * from listas'));
            return view('pesquisaFilmes', ['filme' => $filme], ['lista' => $lista]);
        }
        else{
            $filme = DB::table('filmes')
                ->join('user_filmes', 'filmes.filmeId', '=', 'user_filmes.filme_id')
                ->select('filmes.*', DB::raw('CAST(AVG(user_filmes.avaliacao) AS DECIMAL(10,1)) as ave'))
                ->where('titulo', '=',  $pesquisa)
                ->groupBy('filme_id')
                ->get();
            $lista = DB::select(DB::raw('select * from listas'));
            return view('pesquisaFilmesCA', ['filme' => $filme], ['lista' => $lista]);
        }
    }

    public function criarLista(Request $request){
        $nomeLista = $request->nomeLista;

        DB::insert('insert into listas (nomeLista) values ("'.$nomeLista.'")');

        $ultimoValor = DB::table('listas')
            ->select('listaID')
            ->orderBy('listaId', 'desc')
            ->first();

        DB::insert('insert into user_listas (user_id, lista_id) values ("'.Auth::user()->id.'", "'.$ultimoValor->listaID.'")');
        
        return view('principal');
    }

    public function listas(){
 
        $listas = DB::select(DB::raw('select l.* 
        from listas l, users u, user_listas ul
        where u.id = ul.user_id and u.id =' .Auth::user()->id.'')); 
        
        return view('Listas.listas', ['listas' => $listas]);
    }

    public function deletarLista($listaId){
        
        DB::table('user_listas')->where('lista_id', '=', $listaId)->delete();

        return view('principal');
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
        
        DB::insert('insert ignore into lista_filmes (lista_id, filme_id) values ('.$lf->listaId.', '.$lf->filmeId.')');
        return redirect()->route('listas');
    }

    public function avaliacoes(){
        $listaAvaliacoes = DB::select(DB::raw(' select f.titulo, uf.avaliacao
                                                from users u, user_filmes uf, filmes f
                                                where uf.user_id = u.id and f.filmeId = uf.filme_id and u.id = '.Auth::user()->id.'' ));
        
        return view('avaliacaoDeFilmes', ['listaAvaliacoes' => $listaAvaliacoes]);
    }

    public function avaliar(Request $request, $dados){
        $uf = new UserFilme;
        $uf->avaliacao = $request->nota;  
        $uf->user_id = Auth::user()->id;
        $uf->filme_id = $dados;
        
        DB::insert('insert into user_filmes (user_id, filme_id, avaliacao) values ('.$uf->user_id.', '.$uf->filme_id.','.$uf->avaliacao.')');
        
        return view('principal');
    }
}
