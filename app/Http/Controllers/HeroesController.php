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

    public function store(Request $request, $id = null) {
        $hero = null;
        if (is_null($id)) {
            $hero = Hero::create($request->all());
        } else {
            $hero = Hero::find($id)->update($request->all());
        }
        return 'bla';   
    }    

    public function delete(Request $request, $id) {
        $hero = Hero::find($id);
        $hero->delete();
        return response()->json($hero);
    }    
}
