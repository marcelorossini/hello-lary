<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'hero_skills';

    protected $fillable = ['name'];    

    public $timestamps = false;
    
    public function hero()
    {
        return $this->belongsToMany('App\Hero','hero_x_skills', 'skill_id','hero_id');
    }
}
