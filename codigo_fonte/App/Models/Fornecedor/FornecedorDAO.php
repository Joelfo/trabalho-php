<?php
use App\Core\BaseDAO;
use App\Models\Fornecedor\Fornecedor;

class FornecedorDAO extends BaseDAO {

    public function create(Fornecedor $fornecedor){
        try{ //Tenta a inserção
            $query = "INSERT INTO `fornecedores` (`razao_social`, `cnpj`, `endereco`, `bairro`, `cidade`, `uf`, `cep`, `telefone`, `email`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $conn = $this->getConnection();
            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $fornecedor->getRazaoSocial());
            $stmt->bindValue(2, $fornecedor->getCnpj());
            $stmt->bindValue(3, $fornecedor->getEndereco());
            $stmt->bindValue(4, $fornecedor->getBairro());
            $stmt->bindValue(5, $fornecedor->getCidade());
            $stmt->bindValue(6, $fornecedor->getUf());
            $stmt->bindValue(7, $fornecedor->getCep());
            $stmt->bindValue(8, $fornecedor->getTelefone());
            $stmt->bindValue(9, $fornecedor->getEmail());
            $stmt->execute();

            $conn = null;
        } catch(PDOException $e){
            return "Erro";
        }
    } 

    public function update(Fornecedor $fornecedor){
        try{
            $query = "UPDATE `fornecedores` SET `razao_social` = ?, `cnpj` = ?, `endereco` = ?,  `bairro` = ?, `cidade` = ?,`uf` = ?, `cep` = ?, `telefone` = ?, `email` = ? WHERE `id` = ?";
            $conexao = $this->getConnection();

            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $fornecedor->getRazaoSocial());
            $stmt->bindValue(2, $fornecedor->getCnpj());
            $stmt->bindValue(3, $fornecedor->getEndereco());
            $stmt->bindValue(4, $fornecedor->getBairro());
            $stmt->bindValue(5, $fornecedor->getCidade());
            $stmt->bindValue(6, $fornecedor->getUf());
            $stmt->bindValue(7, $fornecedor->getCep());
            $stmt->bindValue(8, $fornecedor->getTelefone());
            $stmt->bindValue(9, $fornecedor->getEmail());
            $stmt->bindValue(10, $fornecedor->getId());
            
            $stmt->execute();
            $conexao = null;
        } catch(PDOException $e){
            die('Query falhou: ' . $e->getMessage());
        }
    }

    public function get($id){
        try { //Tenta executar a consulta
            $query = "SELECT * FROM `fornecedores` WHERE `id`=?";
            $conn =$this->getConnection();

            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $conn = null;
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            die('Query falhou: ' . $e->getMessage());
        }
    }

    public function read(){
        try {
            $query = "SELECT * FROM `fornecedores`";
            $conexao = $this->getConnection();
            $stmt = $conexao->query($query);
            $conexao = null;
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch(PDOException $e){
            die('Query falhou: ' . $e->getMessage());
        }
    }


    public function getFornecedorCnpj($cnpj){
        $query = 'SELECT * FROM `fornecedores` WHERE `cnpj`=?';
        $conn =$this->getConnection();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(1, $cnpj);
        $stmt->execute();

        $conn = null;
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}

?>
