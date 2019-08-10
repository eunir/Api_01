<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class funcionarios extends Model
{
    //Listar todos
    public function allFuncionarios(){

        return self::all();
        
    }

    //Buscar usuario pelo id
    public function getFuncionarios($id)
    {
        $funcionario = self::find($id);
        if(is_null($funcionario))
        {
            return false;
        }
        return $funcionario;
    }

    //Inserir novo funcionario
    public function insertFuncionarios(){
        $input = Input::all();
        $funcionario = new funcionarios();
        $funcionario->fill($input);
        $funcionario->save();
        return $funcionario;
    }

    //Update funcionario
    public function updateFuncionarios($id){
        $funcionario = self::find($id);
        if(is_null($funcionario)){
            return false;
        }
        $input = Input::all();
        $funcionario->fill($input);
        $funcionario->save();
        return $funcionario;
    }

    //Delete funcionario
    public function deleteFuncionarios($id){
        $funcionario = self::find($id);
        if(is_null($funcionario)){
            return false;
        }
        return $funcionario->delete();
    }
}
