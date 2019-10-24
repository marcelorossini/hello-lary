<?php

use Illuminate\Database\Seeder;

class HeroesTypesSeeder extends Seeder
{
    public function run()
    {
        DB::table('hero_types')->insert([
            'name' => 'Mago',
        ]);        
        DB::table('hero_types')->insert([
            'name' => 'Sacerdote',
        ]);        
        DB::table('hero_types')->insert([
            'name' => 'Lutador',
        ]);        
        DB::table('hero_types')->insert([
            'name' => 'Arqueiro',
        ]);        
        DB::table('hero_types')->insert([
            'name' => 'Cavaleiro',
        ]);        
        DB::table('hero_types')->insert([
            'name' => 'Espadachim',
        ]);             
    }
}
