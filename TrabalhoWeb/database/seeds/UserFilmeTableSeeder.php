<?php

use Illuminate\Database\Seeder;
use App\UserFilme;

class UserFilmeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            'user_id'=>"1",
            'filme_id'=>"1",
            'avaliacao'=>"8.0"
        ];
        if(UserFilme::where('user_id','=', $dados['user_id'])->count()){
            $usuario = UserFilme::where('user_id','=', $dados['user_id'])->first();
            $usuario->update($dados);
            echo "Usuário Alterado! ";
        }else{
            UserFilme::create($dados);
            echo "Usuário Criado! ";
        }  
    }
}
