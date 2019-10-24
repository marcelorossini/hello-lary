<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Marcelo Rossini',
            'email' => 'marcelo_rossini@outlook.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'NewWay',
            'email' => 'teste@newway.com.br',
            'password' => bcrypt('password'),
        ]);
    }
}