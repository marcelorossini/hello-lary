<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'name', 'type', 'skills','life','defense','famage','attack_speed','movement_speed','thumbnail',
    ];

    public function skills()
    {
        return $this->belongsToMany('App\Skill','hero_x_skills', 'hero_id','skill_id');
    }      
}
