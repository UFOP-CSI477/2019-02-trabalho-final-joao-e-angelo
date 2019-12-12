<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFilme extends Model
{
    public function users(){
        return $this->hasMany('App\User');
    }
    public function filmes(){
        return $this->hasMany('App\Filme');
    }
    protected $fillable = [
        'user_id', 'filme_id',
    ];
}
