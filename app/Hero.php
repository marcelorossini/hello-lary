<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'nome', 'tipo', 'especialidade','vida','defesa','dano','velocidade_ataque','velocidade_movimento','thumbnail',
    ];
}
