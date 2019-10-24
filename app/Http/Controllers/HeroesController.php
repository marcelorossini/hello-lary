<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Repositories\HeroRepository;

class HeroesController extends Controller
{
    public function __construct(HeroRepository $hero)
    {
        $this->hero = $hero;
    }    

    // Exibe todos os herois
    public function index() {
        return response()->json($this->hero->all());
    }

    // Cria ou atualiza registros
    public function store(Request $request, $id = null) {
        // Validação
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'type' => 'required',           
            'skills' => 'required'
        ])->setAttributeNames([
            'name' => 'Nome',
            'type' => 'Tipo',
            'skills' => 'Especialidades'
        ]);

        // Se a validação falhar
        if($validator->fails()) 
            return response()->json(['status' => 'error','message' => $validator->messages()]);
        
        // Cria ou atualiza
        $this->hero->createOrUpdate($request->all(),$id);
     
        return response()->json(['status' => 'success']);
    }    

    // Deleta registro
    public function delete(Request $request, $id) {        
        $this->hero->delete($id);
        return response()->json(['status' => 'success']);
    }    
}
