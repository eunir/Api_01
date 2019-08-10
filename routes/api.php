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

Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->user();
});

//Rotas do grupo usuários
Route::namespace('API')->name('api.')->group(function(){

    //Rotas do grupo usuários
    Route::prefix('usuarios')->group(function(){

        Route::get('/','usuariosController@allUsuarios')->name('allUsuarios');
        Route::get('/{id}','usuariosController@getUsuarios')->name('getUsuarios');
        Route::post('/','usuariosController@insertUsuarios')->name('insertUsuarios');
        Route::put('/{id}','usuariosController@updateUsuarios')->name('updateUsuarios');
        Route::delete('/{id}','usuariosController@deleteUsuarios')->name('deleteUsuarios');
        
    });
    
    //Rotas grupo funcionarios
    Route::prefix('funcionarios')->group(function(){

        Route::get('/','funcionariosController@allFuncionarios')->name('allFuncionarios');
        Route::get('/{id}','funcionariosController@getFuncionarios')->name('getFuncionarios');
        Route::post('/','funcionariosController@insertFuncionarios')->name('insertFuncionarios');
        Route::put('/{id}','funcionariosController@updateFuncionarios')->name('updateFuncionarios');
        Route::delete('/{id}','funcionariosController@deleteFuncionarios')->name('deleteFuncionarios');
        
    });

    //rotas grupo chamados
    Route::prefix('chamados')->group(function(){

        Route::get('/','chamadosController@allChamados')->name('allChamados');
        Route::get('/{id}','chamadosController@getChamados')->name('getChamados');
        Route::post('/','chamadosController@insertChamados')->name('insertChamados');
        Route::put('/{id}','chamadosController@updateChamados')->name('updateChamados');
        Route::delete('/{id}','chamadosController@deleteChamados')->name('deleteChamados');
        
    });
});

Route::get('/ok', function(){
    return ['status'=> true];
});

