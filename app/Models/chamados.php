<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use File;

class chamados extends Model
{
    //Dados que poden ser inseridos
    protected $fillable = ['tipo_chamado','status_chamado','descricao','imagem_video','resposta_chamado',
    'data_abertura','longitude','latitude','id_usuario','id_funcionario'];

    //Listar todos
    public function allChamados(){

        return self::all();
        
    } 

    //Insert chamados
    public function insertChamados(){

        $input = Input::all();
        if(Input::file('imagem_video')){
            $imagem = Input::file('imagem_video');
            $extensao = $imagem->getClientOriginalExtension();
            $name = time().'.'.$imagem->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $imagem->move($destinationPath, $name);
            $input['imagem_video'] = $name;
        }

        $chamado = new chamados();
        $chamado->fill($input);
        $chamado->save();
        return $chamado;
    }

    ///update chamados
    public function updateChamados($id){
        $chamado = self::find($id);
        if(is_null($chamado)){
            return false;
        }
        $input = Input::all();
        if(Input::file('imagem_video')){
            $imagem = Input::file('imagem_video');
            $extensao = $imagem->getClientOriginalExtension();
            $name = time().'.'.$imagem->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $imagem->move($destinationPath, $name);
            $input['imagem_video'] = $name;
        }

        $chamado = new chamados();
        $chamado->fill($input);
        $chamado->update();
        return $chamado;
    }

    //delete chamados
    public function deleteChamados($id){
        $chamado = self::find($id);
        if(is_null($chamado)){
            return false;
        }
        return $chamado->delete();
    }
    
}
