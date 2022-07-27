<?php
use App\Models\Compra\Compra;
use App\Core\BaseDAO;

class CompraDAO extends baseDAO{
    public function get($id){
        try { //Tenta executar a consulta
            $query = "SELECT * FROM `compras` WHERE `id`=?";
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
            $query = "SELECT * FROM `compras`";
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
            $query = "DELETE FROM `compras` WHERE `id` = ?";
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
     * Instancia uma compra no banco de dados
     * @param Compra $compra
     * Objeto do tipo compra
     */
    public function create($compra){
        try{
            $query = "INSERT INTO `compras` VALUES(?, ?, ?, ?, ?, ?)";
            $conexao = $this->getConnection();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $compra->getQuantidade_compra());
            $stmt->bindValue(2, $compra->getData_compra());
            $stmt->bindValue(3, $compra->getValor_compra());
            $stmt->bindValue(4, $compra->getId_fornecedor());
            $stmt->bindValue(5, $compra->getId_produto());
            $stmt->bindValue(6, $compra->getId_funcionario());
            $stmt->execute();
        } catch(PDOException $e){
            throw new Exception("Query falhou por: " . $e->getMessage());
        }
    }

    public function update($compra){
        try{
            $query = "UPDATE `compras` SET `quantidade_compra` = ?, `data_compra` = ?, `valor_compra` = ?, `id_fornecedor` = ?, `id_produto` = ?, `id_fornecedor` = ? WHERE id = ?";
            $conexao = $this->getConnection();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $compra->getQuantidade_compra());
            $stmt->bindValue(2, $compra->getData_compra());
            $stmt->bindValue(3, $compra->getValor_compra());
            $stmt->bindValue(4, $compra->getId_fornecedor());
            $stmt->bindValue(5, $compra->getId_produto());
            $stmt->bindValue(6, $compra->getId_funcionario());
            $stmt->bindValue(7, $compra->getId());
            $stmt->execute();
        } catch(PDOException $e){
            throw new Exception("Query falhou por: " . $e->getMessage());
        }
    }

}


?>