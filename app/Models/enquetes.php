<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use File;



class enquetes extends Model
{

    //Dados que poden ser inseridos
    protected $fillable = ['descricao_enquete','comentario','data_abertura','num_votos','id_funcionario'];

    //Listar todas
    public function allEnquetes(){

        return self::all();
        
    }

    //Buscar enquete pelo id
    public function getEnquetes($id)
    {
        $enquete = self::find($id);
        if(is_null($enquete))
        {
            return false;
        }
        return $enquete;
    }

    //Inserir nova enquete
    public function insertEnquetes(){
        $input = Input::all();
        $enquete = new enquetes();
        $enquete->fill($input);
        $enquete->save();
        return $enquete;
    }

    //Update enquetes
    public function updateEnquetes($id){
        $enquete = self::find($id);
        if(is_null($enquete)){
            return false;
        }
        $input = Input::all();
        $enquete->fill($input);
        $enquete->update();
        return $enquete;
    }

    //Delete enquetes
    public function deleteEnquetes($id){
        $enquete = self::find($id);
        if(is_null($enquete)){
            return false;
        }
        return $enquete->delete();
    }
}
