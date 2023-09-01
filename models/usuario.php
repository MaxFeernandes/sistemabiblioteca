<?php

class Usuario
{

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

    public function buscar($id)
    {
    }

    /**
     *Listar todos os registros da tabela usuário
     */
    public function listar()
    {
    }



    /**
     * Cadastrar usuário
     * @param array $dados
     * @return boll
     */
    public function cadastrar($dados)
    {

        try {
            $sql = "INSERT INTO {$this->table}(nome, email, senha, perfil)
        VALUES (:nome, :email, :senha, :perfil)";
            $stmt = $this->db->prepare($sql);
        } catch (PDOException $e) {
            echo "Erro na preparação da consulta:" . $e->getMessage();
        }

        $stmt->bindParam(':nome', $sql['nome']);
        $stmt->bindParam(':email', $sql['email']);
        $stmt->bindParam(':senha', $sql['senha']);
        $stmt->bindParam(':perfil', $sql['prefil']);

        try {
            $stmt->execute();
            echo "Inserção bem-sucedida!";
        } catch (PDOException $e) {
            echo "erro na inserção: " . $e->getMessage();
        }
    }



    /**
     * Editar usuário
     * 
     * @param int $id
     * param array $dados
     * @return bool
     */
    public function editar($id, $dados)
    {
        try {

            $sql = "UPDATE usuarios SET  nome = :nome, email = :email, senha = :senha WHERE id_usuario = :$id";
            $stmt = $this->db->prepare($sql);
        } catch (PDOException $e) {
            echo "Erro na preparação da consulta:" . $e->getMessage();
        }

        $stmt->bindParam(':nome', $sql['nome']);
        $stmt->bindParam(':email', $sql['email']);
        $stmt->bindParam(':senha', $sql['senha']);
        $stmt->bindParam(':perfil', $sql['prefil']);

        try {
            $stmt->execute();
            echo "Atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "erro ao atualizar: " . $e->getMessage();
        }
    }


    //Excluir usuário
    public function excluir($id)
    {
    }
}
