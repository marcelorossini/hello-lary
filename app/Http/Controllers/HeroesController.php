<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Repositories\HeroRepository;
use App\Hero;
use App\HeroSkill;


class HeroesController extends Controller
{
    // Exibe todos os herois
    public function index(HeroRepository $repository) {
        // Trata o caminho da imagem
        return response()->json($repository->getAll());
    }

    // Cria ou atualiza registros
    public function store(Request $request, HeroRepository $repository, $id = null) {
        // Validação
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'type' => 'required'            
        ])->setAttributeNames([
            'name' => 'Nome',
            'type' => 'Tipo'
        ]);

        // Se a validação falhar
        if($validator->fails()) {            
            return response()->json(['status' => 'error','message' => $validator->messages()]);
        }
        
        // Cria ou atualiza
        $repository->createOrUpdate($request->all(),$id);
     
        return response()->json(['status' => 'success']);
    }    

    // Deleta registro
    public function delete(Request $request, $id) {
        // Exclui do banco
        $hero = Hero::find($id);            
        $hero->delete();
        // Exclui a imagem
        if (!is_null($hero->thumbnail)) {
            $file = asset('/img/heroes/'.$hero->thumbnail);
            if (file_exists($file)) {
                unlink($file);
            }
        }

        return response()->json(['status' => 'success']);
    }    
}
