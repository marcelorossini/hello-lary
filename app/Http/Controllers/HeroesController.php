<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;

class HeroesController extends Controller
{
    // Exibe todos os herois
    public function index() {
        $heroes = Hero::orderBy('id','desc')->get();
        return response()->json($heroes);
    }

    // Cria ou atualiza registros
    public function store(Request $request, $id = null) {
        
        try {      
            // Verifica nome
            if ($request->has('nome') && $request->nome == '')
               throw new \Exception('Informe o nome do guerreiro!'); 
            // Verifica tipo
            if ($request->has('tipo') && $request->tipo == '')
                throw new \Exception('Informe o tipo do guerreiro!');                

            if (is_null($id)) {      
                $hero = Hero::create($request->all());
                $id = $hero->id;
            } else {
                Hero::find($id)->update($request->all());
            }                 
        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => $e->getMessage()]);
        }                           

        // Salva imagem
        try {      
            if($request->hasFile('thumbnail')) {
                $image = $request->file('thumbnail');
                $file = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/img/heroes'), $file);
                // Atualiza nome 
                $hero = Hero::find($id);
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
        try {
            // Exclui do banco
            $hero = Hero::find($id);            
            $hero->delete();
            // Exclui a imagem
            $file = public_path('/img/heroes/'.$hero->thumbnail);
            if (file_exists($file)) {
                unlink($file);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => 'Não foi possivel deletar o guerreiro!']);
        }       

        return response()->json(['status' => 'success']);
    }    
}
