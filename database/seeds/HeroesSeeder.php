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
            'thumbnail' => 'xxx'
        ]);
    }
}
