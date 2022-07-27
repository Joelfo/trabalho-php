<?php
use App\Core\BaseDAO;
use App\Models\Produto;

class ProdutoDAO extends BaseDAO {
    public function get($id){
        try { //Tenta executar a consulta
            $query = "SELECT * FROM `produtos` WHERE `id`=?";
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
            $query = "SELECT * FROM `produtos`";
            $conexao = $this->getConnection();
            $stmt = $conexao->query($query);
            $conexao = null;
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch(PDOException $e){
            die('Query falhou: ' . $e->getMessage());
        }
    }
}

?>