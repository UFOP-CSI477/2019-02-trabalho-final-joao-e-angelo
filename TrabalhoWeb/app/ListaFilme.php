<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaFilme extends Model
{
    public function listas(){
        return $this->hasMany('App\Lista');
    }
    public function filmes(){
        return $this->hasMany('App\Filme');
    }
    protected $fillable = [
        'lista_id', 'filme_id',
    ];
}
