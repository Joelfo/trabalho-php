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

    public function getProdutoNome($nome){
        try{
            $query = "SELECT * FROM `produtos` WHERE `nome_produto` = ?";
            $conexao = $this->getConnection();

            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $nome);
            $stmt->execute();
            $conexao = null;
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Query falhou por: " . $e->getMessage());
        }
    }

    public function read(){
        try {
            $query = "SELECT `id`, `nome_produto`, `descricao`, `preco_compra`, `preco_venda`,`quantidade_disponível`, `liberado_venda`, `id_categoria` FROM `produtos`";
            $conexao = $this->getConnection();
            $stmt = $conexao->query($query);
            $conexao = null;
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch(PDOException $e){
            die('Query falhou: ' . $e->getMessage());
        }
    }

    /**
     * @param Produto $produto
     */
    public function LiberaVenda($id){
        try {
        $query = "UPDATE `produtos` SET `liberado_venda` = 'S' WHERE `id` = ?";
        $conexao = $this->getConnection();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $conexao = null;
        } catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function BloqueiaVenda($id){
        try {
        $query = "UPDATE `produtos` SET `liberado_venda` = 'N' WHERE `id` = ?";
        $conexao = $this->getConnection();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $conexao = null;
        } catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>