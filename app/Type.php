<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'hero_types';

    public $timestamps = false;

    protected $fillable = ['nome'];
}
