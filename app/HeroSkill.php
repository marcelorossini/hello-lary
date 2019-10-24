<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeroSkill extends Model
{
    protected $table = 'hero_x_skills';

    protected $fillable = [
        'hero_id', 'skill_id'
    ];


    public $timestamps = false;
}
