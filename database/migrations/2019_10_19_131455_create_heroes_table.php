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
            $table->string('name');
            $table->integer('type')->references('id')->on('heroes_types');
            $table->integer('life')->nullable();
            $table->integer('defense')->nullable();
            $table->integer('damage')->nullable();
            $table->float('attack_speed',10,2)->nullable();
            $table->float('movement_speed',10,2)->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamps();
          });
    }

    public function down()
    {
        Schema::dropIfExists('heroes');
    }
}
