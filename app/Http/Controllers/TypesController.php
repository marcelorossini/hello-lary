<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypesController extends Controller
{
    // Exibe todos os tipos dos herois
    public function index() {
        $type = Type::get();
        return response()->json($type);
    }
}
