<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/alunomodel.php";


Class AlunoController{
 
    private $alunoModel;

    public function __construct(){
        $this->alunoModel = new Aluno();

    }


    public function listarAlunos(){
        return $this->alunoModel->listarAluno();

    }
}

 