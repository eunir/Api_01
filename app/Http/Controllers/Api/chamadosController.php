<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\chamados;
use Response;


class chamadosController extends Controller
{
    //construtor instanciando a classe model
    protected $chamados = null;
    public function __construct(chamados $chamados){
        $this->chamados = $chamados;
    }

    //Buscar todos os chamados
    public function allChamados(){

        return $this->chamados->allChamados();

    }

    //buscar chamados pelo id
    public function getChamados($id){
        $chamados = $this->chamados->getChamados($id);
        if(!$chamados){
            return Response::json(['response'=>'Chamado não encontrado'], 400);
        }
        return Response::json($chamados,200);
    }

    //Inserir novo chamado
    public function insertChamados(){
    // dd($request->all());
        return $this->chamados->insertChamados();
    }

    //Alterar chamado
    public function updateChamados($id){
        $chamados = $this->chamados->updateChamados($id);
        if(!$chamados){
            return Response::json(['response'=>'Chamado não encontrado'], 400);
        }
        return Response::json($chamados,200);
    }

    //Deletar chamado
    public function deleteChamados($id){
        $chamados = $this->chamados->deleteChamados($id);
        if(!$chamados){
            return Response::json(['response'=>'Chamado não encontrado'], 400);
        }
        return Response::json(['response'=>'Chamado excluido com sucesso'],200);
    }
}
