<?php

use Illuminate\Database\Seeder;

class HeroesSeeder extends Seeder
{
    public function run()
    {
        DB::table('heroes')->insert([
            'nome' => 'STEVEN',
            'tipo' => 'Mago',
            'especialidade' => 'Magia Branca',
            'vida' => 2900,
            'defesa' => 200,
            'dano' => 340,
            'velocidade_ataque' => 1.3,
            'velocidade_movimento' => 320,
            'thumbnail' => 'steven.gif'
        ]);
        DB::table('heroes')->insert([
            'nome' => 'BRAIAN',
            'tipo' => 'Arqueiro',
            'especialidade' => 'Ataque à distância',
            'vida' => 2400,
            'defesa' => 190,
            'dano' => 330,
            'velocidade_ataque' => 1.8,
            'velocidade_movimento' => 320,
            'thumbnail' => 'braian.gif'
        ]);
        DB::table('heroes')->insert([
            'nome' => 'GRUNTAR',
            'tipo' => 'Cavaleiro',
            'especialidade' => 'Ataque em área',
            'vida' => 3700,
            'defesa' => 240,
            'dano' => 190,
            'velocidade_ataque' => 1.4,
            'velocidade_movimento' => 345,
            'thumbnail' => 'gruntar.gif'
        ]);                
    }
}
