<?php

use App\Models\Categoria\Categoria;
use App\Core\BaseDAO;
use \PDO;
use \PDOException;


class CategoriaDAO extends BaseDAO{
    public function get($id){
        try { //Tenta executar a consulta
            $query = "SELECT * FROM `categorias` WHERE `id`=?";
            $conn = $this->getConnection();

            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $conn = null;
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            throw new Exception("Query falhou por: " . $e->getMessage());
        }
    }

    public function read(){
        try {
            $query = "SELECT * FROM `categorias`";
            $conexao = $this->getConnection();
            $stmt = $conexao->query($query);
            $conexao = null;
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch(PDOException $e){
            throw new Exception("Query falhou por: " . $e->getMessage());
        }
    }

    public function delete($id){
        try{
            $query = "DELETE FROM `categorias` WHERE `id` = ?";
            $conexao = $this->getConnection();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $conexao = null;
        } catch(PDOException $e){
            throw new Exception("Query falhou por: " . $e->getMessage());
        }
    }


    /**
     * Cria categoria no BD
     * @param Categoria $categoria
     * Objeto categoria contendo os dados da categoria a criar
     */
    public function create($categoria){
        try{
            $query = "INSERT INTO `categorias` VALUES(?, ?)";
            $conexao = $this->getConnection();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $categoria->getId());
            $stmt->bindValue(2, $categoria->getNome_categoria());
            $stmt->execute();
        } catch(PDOException $e){
            throw new Exception("Query falhou por: " . $e->getMessage());
        }
    }

    /**
     * Atualiza uma categoria no BD
     * @param Categoria $categoria
     * Objeto categoria contendo os dados atualizados
     */
    public function update($categoria){  
        try{
            $query = "UPDATE `categorias` SET `nome_categoria`=? WHERE `id`=?";
            $conexao = $this->getConnection();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $categoria->getNome_categoria());
            $stmt->bindValue(2, $categoria->getId());
            $stmt->execute();
        } catch(PDOException $e){
            throw new Exception("Query falhou por: " . $e->getMessage());
        }
    }




}

?>