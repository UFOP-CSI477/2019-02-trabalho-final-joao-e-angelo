<?php

use Illuminate\Database\Seeder;
use App\Lista;

class ListasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            'nomeLista'=>"Filmes de Mafia",
        ];
        if(Lista::where('nomeLista','=', $dados['nomeLista'])->count()){
            $usuario = Lista::where('nomeLista','=', $dados['nomeLista'])->first();
            $usuario->update($dados);
            echo "Usuário Alterado! ";
        }else{
            Lista::create($dados);
            echo "Usuário Criado! ";
        }
    }    
}

