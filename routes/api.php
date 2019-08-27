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

    //Rotas para login
    Route::prefix('login')->group(function(){

        Route::post('/','loginControler@login');
        
    });

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

    //rotas grupo enquetes
    Route::prefix('enquetes')->group(function(){

        Route::get('/','enquetesController@allEnquetes')->name('allEnquetes');
        Route::get('/{id}','enquetesController@getEnquetes')->name('getEnquetes');
        Route::post('/','enquetesController@insertEnquetes')->name('insertEnquetes');
        Route::put('/{id}','enquetesController@updateEnquetes')->name('updateEnquetes');
        Route::delete('/{id}','enquetesController@deleteEnquetes')->name('deleteEnquetes');
        
    });

    //rotas grupo votos
    Route::prefix('votos')->group(function(){

        Route::get('/','votosController@allVotos')->name('allVotos');
        Route::get('/{id}','votosController@getVotos')->name('getVotos');
        Route::post('/','votosController@insertVotos')->name('insertVotos');
        Route::put('/{id}','votosController@updateVotos')->name('updateVotos');
        Route::delete('/{id}','votosController@deleteVotos')->name('deleteVotos');
        
    });

    //rotas grupo informações
    Route::prefix('informacoes')->group(function(){

        Route::get('/','informacoesController@allInformacoes')->name('allInformacoes');
        Route::get('/{id}','informacoesController@getInformacoes')->name('getInformacoes');
        Route::post('/','informacoesController@insertInformacoes')->name('insertInformacoes');
        Route::put('/{id}','informacoesController@updateInformacoes')->name('updateInformacoes');
        Route::delete('/{id}','informacoesController@deleteInformacoes')->name('deleteInformacoes');
        
    });

    //rotas grupo documentos
    Route::prefix('documentos')->group(function(){

        Route::get('/','documentosController@allDocumentos')->name('allDocumentos');
        Route::get('/{id}','documentosController@getDocumentos')->name('getDocumentos');
        Route::post('/','documentosController@insertDocumentos')->name('insertDocumentos');
        Route::put('/{id}','documentosController@updateDocumentos')->name('updateDocumentos');
        Route::delete('/{id}','documentosController@deleteDocumentos')->name('deleteDocumentos');
        
    });
});

Route::get('/ok', function(){
    return ['status'=> true];
});

