<?php

use Illuminate\Database\Seeder;

class HeroXSkillsSeeder extends Seeder
{
    public function run()
    {
        DB::table('hero_x_skills')->insert([
            'hero_id' => 1,
            'skill_id' => 2,
        ]);     
        DB::table('hero_x_skills')->insert([
            'hero_id' => 1,
            'skill_id' => 4,
        ]);             
        DB::table('hero_x_skills')->insert([
            'hero_id' => 2,
            'skill_id' => 1,
        ]);                
        DB::table('hero_x_skills')->insert([
            'hero_id' => 2,
            'skill_id' => 6,
        ]);                  
        DB::table('hero_x_skills')->insert([
            'hero_id' => 3,
            'skill_id' => 5,
        ]);                       
    }
}
