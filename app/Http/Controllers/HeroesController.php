<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;

class HeroesController extends Controller
{
    public function index() {
        $heroes = Hero::get();
        return response()->json($heroes);
    }

    public function create() {
        $teste = new Hero;
        $teste->nome = 'teste';
        $teste->tipo = 'teste';
        $teste->save();
        return 'bla';
    }    
}
