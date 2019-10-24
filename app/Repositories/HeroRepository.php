<?php

namespace App\Repositories;

use Illuminate\Support\Arr;
use App\Hero;
use App\HeroSkill;

class HeroRepository 
{
	public function __construct(Hero $model)
	{
		$this->model = $model;
	}

    // Retorna todos
	public function all()
	{
        return $this->model->with('skills')->orderBy('id','desc')->get()->map(function ($hero) {
            $hero->thumbnail = !is_null($hero->thumbnail) ? asset('/img/heroes/'.$hero->thumbnail) : '';
            return $hero;
        });        
    }   
    
    // Cria ou atualiza Heroi
	public function createOrUpdate($data,$id)
	{
        // Cria usuário
        $data_hero = Arr::except($data,['skills','thumbnail']);
        if (is_null($id)) {
            $hero = $this->model->create($data_hero);
            $id = $hero->id;  
        } else {
            $hero = $this->model->find($id)->update($data_hero);  
        }   
        
        // Grava as especialidades
        $this->createSkills($data['skills'],$id);  
                          
        // Salva imagem
        if(isset($data['thumbnail']) && (!is_null($data['thumbnail']) || $data['thumbnail'] != '' )) {
            $this->createThumbnail($data['thumbnail'],$id);
        }        

        return $hero;     
    }    
    
    // Cria as especialidades
	public function createSkills($skills, $hero_id)
	{
        // Deleta especialidade anterioes
        HeroSkill::where('hero_id',$hero_id)->delete();
        // Cria novas especialidades
        foreach ($skills as $item) {            
            $hero_skill = HeroSkill::create([
                'hero_id' => $hero_id,
                'skill_id' => $item
            ]);  
        }   
        return;
    } 
    
    // Cria a thumbnail
	public function createThumbnail($image, $hero_id)
	{
        // Salva arquivo
        $file = $hero_id.'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/img/heroes'), $file);
        // Atualiza model
        $this->model->find($hero_id)->update(['thumbnail' => $file]);
        return;
    }    

    // Deleta o registro
	public function delete($hero_id)
	{
        // Exclui do banco
        $hero = $this->model->find($hero_id);            
        $hero->delete();
        // Exclui a imagem
        if (!is_null($hero->thumbnail)) {
            $file = public_path('/img/heroes/'.$hero->thumbnail);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        return;
    }   
}