<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Usuario.php";

 

Class UsuarioController{

 

    private $usuarioModel;

 

    public function __construct(){

        $this->usuarioModel = new Usuario();

    }

 

    public function listarUsuarios(){

        return $this->usuarioModel->listar();

    }

 

}

 