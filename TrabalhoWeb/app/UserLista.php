<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLista extends Model
{
    public function users(){
        return $this->hasOne('App\User');
    }
    public function listas(){
        return $this->hasMany('App\Lista');
    }
    protected $fillable = [
        'user_id', 'lista_id',
    ];
}
