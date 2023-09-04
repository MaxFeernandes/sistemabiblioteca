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
        try {

            $sql = "SELECT * FROM {$this->table} WHERE id_usuario = :id;";
            $stmt = $this->db->prepare($sql);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->execute();
            $stmt->BlindParam(':id', $id, PDO::PARAM_INT);

            if ($usuario) {

                echo "ID: " . $id['id_usuario'] . "<br>";
                echo "Nome: " . $id['nome'] . "<br>";
                echo "Email: " . $id['email'] . "<br>";
            }
        } catch (PDOException $e)
        {
         echo "Erro na listagem dos dados" . $e->getMessage();
        }
    }

    /**
     *Listar todos os registros da tabela usuário
     */
    public function listar($id)
    {

            try{
      
            $sql = "SELECT * FROM {$this->table} WHERE id_usuario = :id;";     
            $stmt = $this->db->prepare($sql);   
            $usuario=$stmt->fetch(PDO::FETCH_ASSOC);    
            $stmt->execute();    
            $stmt->BlindParam(':id', $id, PDO::PARAM_INT);
      
            if($usuario){
      
               echo "ID: ". $id['id_usuario']. "<br>";    
               echo "Nome: ". $id['nome']. "<br>";     
               echo "Email: ". $id['email']. "<br>";
                         
            }
      
            }catch(PDOException $e){
      
               echo "Erro na listagem dos dados" .$e->getMessage();
      
            }
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
        try {
            //MONTAGEM E PREPARAÇÃO DO SQL
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            //PASSAGEM DE PARAMETROS E EXECUÇÃO DO SQL
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao Deletar" . $e->getMessage();
        }
    }
}