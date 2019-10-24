<?php

use Illuminate\Database\Seeder;

class HeroesSeeder extends Seeder
{
    public function run()
    {
        DB::table('heroes')->insert([
            'name' => 'STEVEN',
            'type' => 1,
            'life' => 2900,
            'defense' => 200,
            'damage' => 340,
            'attack_speed' => 1.3,
            'movement_speed' => 320,
            'thumbnail' => 'steven.gif'
        ]);
        DB::table('heroes')->insert([
            'name' => 'BRAIAN',
            'type' => 2,
            'life' => 2400,
            'defense' => 190,
            'damage' => 330,
            'attack_speed' => 1.8,
            'movement_speed' => 320,
            'thumbnail' => 'braian.gif'
        ]);
        DB::table('heroes')->insert([
            'name' => 'GRUNTAR',
            'type' => 3,
            'life' => 3700,
            'defense' => 240,
            'damage' => 190,
            'attack_speed' => 1.4,
            'movement_speed' => 345,
            'thumbnail' => 'gruntar.gif'
        ]);                
    }
}
