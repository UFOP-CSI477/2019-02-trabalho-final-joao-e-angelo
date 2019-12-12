<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $fillable = [
        'filmeID', 'titulo', 'descricao', 'genero', 'cIndicativa', 'nota', 'foto',
    ];
}
