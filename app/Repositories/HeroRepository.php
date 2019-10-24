<?php

namespace App\Repositories;

use Illuminate\Support\Arr;
use App\Hero;
use App\HeroSkill;

class HeroRepository 
{
	private $model;

	public function __construct(Hero $model)
	{
		$this->model = $model;
	}

	public function getAll()
	{
        return $this->model->with('skills')->orderBy('id','desc')->get()->map(function ($hero) {
            $hero->thumbnail = !is_null($hero->thumbnail) ? asset('/img/heroes/'.$hero->thumbnail) : '';
            return $hero;
        });        
    }   
    
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
        if (isset($data['skills'])) {
            $this->createSkills($data['skills'], $id);    
        }
                          
        // Salva imagem
        if(isset($data['thumbnail']) && (!is_null($data['thumbnail']) || $data['thumbnail'] != '' )) {
            $this->createThumbnail($data['thumbnail'],$id);
        }        

        return $hero;     
    }    
    
	public function createSkills($skills, $hero_id)
	{
        // Deleta especialidade anterioes
        HeroSkill::where('hero_id',$hero_id)->delete();
        // Cria novas especialidades
        foreach ($skills as $item) {            
            $hero_skill = new HeroSkill;  
            $hero_skill->hero_id = $hero_id;   
            $hero_skill->skill_id = $item;  
            $hero_skill->save();
        }   
    } 
    
	public function createThumbnail($image, $hero_id)
	{
        // Salva arquivo
        $file = $hero_id.'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/img/heroes'), $file);
        // Atualiza model
        $this->model->find($hero_id)->update(['thumbnail',$file]);
    }    
}