<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\funcionarios;
use Response;

class funcionariosController extends Controller
{
    //construtor instanciando a classe model
    protected $funcionario = null;
    public function __construct(funcionarios $funcionario){
        $this->funcionario = $funcionario;
    }

    //Buscar todos os funcionarios
    public function allFuncionarios(){

        return $this->funcionario->allFuncionarios();

    }

    //buscar funcionarios pelo id
    public function getFuncionarios($id){
        $funcionario = $this->funcionario->getFuncionarios($id);
        if(!$funcionario){
            return Response::json(['response'=>'Usuario não encontrado'], 400);
        }
        return Response::json($funcionario,200);
    }

    //Inserir novo funcionario
    public function insertFuncionarios(){
        return $this->funcionario->insertFuncionarios();
    }

    //Alterar funcionario
    public function updateFuncionarios($id){
        $funcionario = $this->funcionario->getFuncionarios($id);
        if(!$funcionario){
            return Response::json(['response'=>'Usuario não encontrado'], 400);
        }
        return Response::json($funcionario,200);
    }

    //Deletar funcionario
    public function deleteFuncionarios($id){
        $funcionario = $this->funcionario->deleteFuncionarios($id);
        if(!$funcionario){
            return Response::json(['response'=>'Usuario não encontrado'], 400);
        }
        return Response::json(['response'=>'Usuario excluido com sucesso'],200);
    }
}
