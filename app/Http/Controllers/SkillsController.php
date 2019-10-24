<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;

class SkillsController extends Controller
{
    // Exibe todos as Especialidades dos Heroes
    public function index() {
        $skill = Skill::get();
        return response()->json($skill);
    }
}
