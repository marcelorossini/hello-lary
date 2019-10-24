<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(HeroesSeeder::class);
        $this->call(HeroesTypesSeeder::class);
        $this->call(HeroesSkillsSeeder::class);
        $this->call(HeroXSkillsSeeder::class);
    }
}
