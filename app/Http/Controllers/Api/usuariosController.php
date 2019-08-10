<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\usuarios;
use Response;

class usuariosController extends Controller
{
    //construtor instanciando a classe model
    protected $user = null;
    public function __construct(usuarios $user){
        $this->user = $user;
    }

    //Buscar todos os usuarios
    public function allUsuarios(){

        return $this->user->allUsuarios();
    }

    //buscar usuarios pelo id
    public function getUsuarios($id){
        $user = $this->user->getUsuario($id);
        if(!$user){
            return Response::json(['response'=>'Usuario não encontrado'], 400);
        }
        return Response::json($user,200);
    }

    //Inserir novo usuario
    public function insertUsuarios(){
        return $this->user->insertUsuario();
    }

    //Alterar usuarios
    public function updateUsuarios($id){
        $user = $this->user->getUsuario($id);
        if(!$user){
            return Response::json(['response'=>'Usuario não encontrado'], 400);
        }
        return Response::json($user,200);
    }

    //Deletar usuarios
    public function deleteUsuarios($id){
        $user = $this->user->deleteUsuario($id);
        if(!$user){
            return Response::json(['response'=>'Usuario não encontrado'], 400);
        }
        return Response::json(['response'=>'Usuario excluido com sucesso'],200);
    }

}
