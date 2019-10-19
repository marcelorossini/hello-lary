<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroesTable extends Migration
{
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('tipo');
            $table->string('especialidade')->nullable();
            $table->integer('vida')->nullable();
            $table->integer('defesa')->nullable();
            $table->integer('dano')->nullable();
            $table->float('velocidade_ataque',6,2)->nullable();
            $table->float('velocidade_movimento',6,2)->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamps();
          });
    }

    public function down()
    {
        Schema::drop('heroes');
    }
}
