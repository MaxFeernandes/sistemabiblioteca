<?php

class Usuario{

protected $db;
protected $table = "usuarios";

public function __construct()
{
    $this->db = DBconexao::getConexao();
}

/**
 * Busca registro unico
 * @param int $id
 * @return Usuario
 */

public function buscar($id){

}

/**
*Listar todos os registros da tabela usuário
*/
public function listar(){

}


/**
 * Cadastrar usuário
 * @param array $dados
 * @return boll
 */
public function cadastrar($dados){

}


/**
 * Editar usuário
 * 
 * @param int $id
 * param array $dados
 * @return bool
 */
public function editar($id, $dados){

}


//Excluir usuário
public function excluir($id){

}



}