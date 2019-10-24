<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'hero_types';

    protected $fillable = ['nome'];

    public $timestamps = false;
}
