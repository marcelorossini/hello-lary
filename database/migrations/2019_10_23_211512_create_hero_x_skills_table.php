<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroXSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('hero_x_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hero_id');
            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('cascade');            
            $table->unsignedInteger('skill_id');            
        });
    }

    public function down()
    {
        Schema::dropIfExists('hero_x_skills');
    }
}
