<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\enquetes;
use Response;

class enquetesController extends Controller
{
    //construtor instanciando a classe model
    protected $enquetes = null;
    public function __construct(enquetes $enquetes){
        $this->enquetes = $enquetes;
    }

    //Buscar todas as enquetes
    public function allEnquetes(){

        return $this->enquetes->allEnquetes();

    }

    //buscar enquetes pelo id
    public function getEnquetes($id){
        $enquetes = $this->enquetes->getEnquetes($id);
        if(!$enquetes){
            return Response::json(['response'=>'Enquete não encontrada'], 400);
        }
        return Response::json($enquetes,200);
    }

    //Inserir nova enquete
    public function insertEnquetes(){
    // dd($request->all());
        return $this->enquetes->insertEnquetes();
    }

    //Alterar enquetes
    public function updateEnquetes($id){
        $enquetes = $this->enquetes->updateEnquetes($id);
        if(!$enquetes){
            return Response::json(['response'=>'Enquete não encontrada'], 400);
        }
        return Response::json($enquetes,200);
    }

    //Deletar enquete
    public function deleteEnquetes($id){
        $enquetes = $this->enquetes->deleteEnquetes($id);
        if(!$enquetes){
            return Response::json(['response'=>'Enquete não encontrada'], 400);
        }
        return Response::json(['response'=>'Enquete excluida com sucesso'],200);
    }
}
