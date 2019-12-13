<?php

use Illuminate\Database\Seeder;
use App\ListaFilme;

class ListaFilmeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            'filme_id'=>"3",
            'lista_id'=>"2"
        ];
        if(ListaFilme::where('lista_id','=', $dados['lista_id'])->count()){
            $usuario = ListaFilme::where('lista_id','=', $dados['lista_id'])->first();
            $usuario->update($dados);
            echo "Usuário Alterado! ";
        }else{
            ListaFilme::create($dados);
            echo "Usuário Criado! ";
        }    
    }
}
