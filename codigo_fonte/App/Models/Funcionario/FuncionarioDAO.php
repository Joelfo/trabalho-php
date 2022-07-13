<?php
use App\Core\BaseDAO;
use App\Models\Funcionario\Funcionario;

class FuncionarioDAO extends BaseDAO {
    public function create(Funcionario $funcionario){
        try{ //Tenta a inserção
            $query = "INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `senha`, `papel`) VALUES(?, ?, ?, ?, ?)";
            $conn = FuncionarioDAO::getConnection();

            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $funcionario->getId());
            $stmt->bindValue(2, $funcionario->getNome());
            $stmt->bindValue(3, $funcionario->getCpf());
            $stmt->bindValue(4, $funcionario->getSenha());
            $stmt->bindValue(5, $funcionario->getPapel());
            $stmt->execute();

            $chaveGerada = $conn->lastInsertId();
            $conn = null;
            return $chaveGerada;
        } catch(PDOException $e){
            die('Query falhou: ' . $e->getMessage());
        }
    } 



    public function get($id){
        try { //Tenta executar a consulta
            $query = "SELECT * FROM `funcionarios` WHERE `id`=?";
            $conn = FuncionarioDAO::getConnection();

            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $conn = null;
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            die('Query falhou: ' . $e->getMessage());
        }
    }


    public function getFuncionarioCPF($cpf){
        $query = 'SELECT * FROM `funcionarios` WHERE `cpf`=?';
        $conn = FuncionarioDAO::getConnection();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(1, $cpf);
        $stmt->execute();

        $conn = null;
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}

?>