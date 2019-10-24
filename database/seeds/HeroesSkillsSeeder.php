<?php

use Illuminate\Database\Seeder;

class HeroesSkillsSeeder extends Seeder
{
    public function run()
    {
        DB::table('hero_skills')->insert([
            'name' => 'Magia Branca',
        ]);   
        DB::table('hero_skills')->insert([
            'name' => 'Cura',
        ]);   
        DB::table('hero_skills')->insert([
            'name' => 'Tanker',
        ]);   
        DB::table('hero_skills')->insert([
            'name' => 'Invocação',
        ]);   
        DB::table('hero_skills')->insert([
            'name' => 'Ataque à distância',
        ]);   
        DB::table('hero_skills')->insert([
            'name' => 'Matador de Chefes',
        ]);   
        DB::table('hero_skills')->insert([
            'name' => 'Antitanque',
        ]);   
    }
}
