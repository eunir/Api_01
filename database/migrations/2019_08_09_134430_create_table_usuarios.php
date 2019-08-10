<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_usuario',30);
            $table->string('endereco',100);
            $table->string('cpf_usuario',14);
            $table->string('email_usuario',30);
            $table->string('cidade_usuario',30);
            $table->decimal('nivel_acesso',10);
            $table->string('usuario',20);
            $table->string('senha',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
