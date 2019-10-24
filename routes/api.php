<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Api dos herois
Route::prefix('heroes')->group(function () {
    // Exibe todos os herois
    Route::get('','HeroesController@index');   
    // Grava ou atualiza o heroi
    Route::post('{id?}','HeroesController@store');    
    // Exclui o heroi
    Route::delete('{id}','HeroesController@delete');    

    // Exibe todas os tipos dos herois
    Route::get('/types','TypesController@index');    
    // Exibe todas as especialidades dos herois
    Route::get('/skills','SkillsController@index');    
});

