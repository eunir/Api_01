<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class usuarios extends Model
{
    //Não retornar
    protected $hidden = ['senha'];

    //Dados que poden ser inseridos
    protected $fillable = ['nome_usuario','endereco','cpf_usuario','email_usuario','cidade_usuario',
    'nivel_acesso','usuario','senha'];

    //Listar todos
    public function allUsuarios(){

        return self::all();
        
    }

    //Buscar usuario pelo id
    public function getUsuario($id)
    {
        $usuario = self::find($id);
        if(is_null($usuario))
        {
            return false;
        }
        return $usuario;
    }

    //Inserir novo usuario
    public function insertUsuario(){
        $input = Input::all();
        //$input['senha'] = Hash::make($input['senha']);
        $usuario = new usuarios();
        $usuario->fill($input);
        $usuario->save();
        return $usuario;
    }

    //Update usuario
    public function updateUsuario($id){
        $usuario = self::find($id);
        if(is_null($usuario)){
            return false;
        }
        $input = Input::all();
        //$input['senha'] = Hash::make($input['senha']);
        $usuario->fill($input);
        $usuario->save();
        return $usuario;
    }

    //Delete usuario
    public function deleteUsuario($id){
        $usuario = self::find($id);
        if(is_null($usuario)){
            return false;
        }
        return $usuario->delete();
    }
}
