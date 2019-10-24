<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Hero;
use App\HeroSkill;

class HeroesController extends Controller
{
    // Exibe todos os herois
    public function index() {
        // Trata o caminho da imagem
        $heroes = Hero::with('skills')->orderBy('id','desc')->get()->map(function ($hero) {
            $hero->thumbnail = !is_null($hero->thumbnail) ? asset('/img/heroes/'.$hero->thumbnail) : '';
            return $hero;
        });
        return response()->json($heroes);
    }

    // Cria ou atualiza registros
    public function store(Request $request, $id = null) {
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
                
        // Cria ou atualiza os herois
        if (!is_null($id)) {
            $hero = Hero::find($id);
        } else {
            $hero = new Hero;                  
        }            
        $hero->name = $request->name;             
        $hero->type = $request->type;             
        $hero->life = $request->life;             
        $hero->defense = $request->defense;             
        $hero->damage = $request->damage;             
        $hero->attack_speed = $request->attack_speed;             
        $hero->movement_speed = $request->movement_speed;           
        $hero->save();
        
        // Grava as especialidades
        HeroSkill::where('hero_id',$hero->id)->delete();
        foreach ($request->skills as $item) {            
            $hero_skill = new HeroSkill;  
            $hero_skill->hero_id = $hero->id;   
            $hero_skill->skill_id = $item;  
            $hero_skill->save();
        }                    

        // Salva imagem
        try {      
            if($request->hasFile('thumbnail')) {
                $image = $request->file('thumbnail');
                $file = $hero->id.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/img/heroes'), $file);
                // Atualiza nome 
                $hero = Hero::find($hero->id);
                $hero->thumbnail = $file;
                $hero->save();
            }  
        } catch (\Exception $e) {
            return response()->json(['status' => 'warning','message' => 'Não foi possivel fazer upload!']);
        }     
     
        return response()->json(['status' => 'success']);
    }    

    // Deleta registro
    public function delete(Request $request, $id) {
        // Exclui do banco
        $hero = Hero::find($id);            
        $hero->delete();
        // Exclui a imagem
        if (!is_null($hero->thumbnail)) {
            $file = public_path('/img/heroes/'.$hero->thumbnail);
            if (file_exists($file)) {
                unlink($file);
            }
        }

        return response()->json(['status' => 'success']);
    }    
}
