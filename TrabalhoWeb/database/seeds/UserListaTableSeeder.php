<?php

use Illuminate\Database\Seeder;
use App\UserLista;

class UserListaTableSeeder extends Seeder
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
            'lista_id'=>"1"
        ];
        if(UserLista::where('lista_id','=', $dados['lista_id'])->count()){
            $usuario = UserLista::where('lista_id','=', $dados['lista_id'])->first();
            $usuario->update($dados);
            echo "Usuário Alterado! ";
        }else{
            UserLista::create($dados);
            echo "Usuário Criado! ";
        }    
    }
}
