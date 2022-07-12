<?php

require_once "././configuration/connect.php";

class ClientModel extends Connect{
    
    private $table;

    function __construct(){
        parent::__construct();
        $this->table = "clientes";
    }

    public function getAll(){
        $sqlSelect = $this->connection->query("SELECT * FROM $this->table");
        $resultQuery = $sqlSelect->fetchAll();
        return $resultQuery;
    }

    public function search($data,$view=null){
        if($view == 'index')
        {
            $sqlSelect = $this->connection->query("SELECT * FROM $this->table WHERE id = '$data' or name LIKE '%$data%' or email LIKE '%$data%' or phone LIKE '%$data%'");
        }
        else
        {
            $sqlSelect = $this->connection->query("SELECT * FROM $this->table WHERE id = '$data'");
        }
        $resultQuery = $sqlSelect->fetchAll();
        return $resultQuery;
    }

    public function new($data){
        $sqlUpdate = "INSERT INTO $this->table (nome, cpf, endereco,bairro, cidade, uf, cep, telefone, email) 
        VALUES (:nome, :cpf, :endereco, :bairro, :cidade, :uf, :cep, :telefone, :email)";
        $resultQuery = $this->connection->prepare($sqlUpdate)->execute(['nome'=>$data['nome'],'cpf'=>$data['cpf'],'endereco'=>$data['endereco'],'bairro'=>$data['bairro'],'cidade'=>$data['cidade'],'uf'=>$data['uf'], 'cep'=>$data['cep'],'telefone'=>$data['telefone'],'email'=>$data['email']]) ;
        return $this->verifyReturn($resultQuery);
    }

    public function edit($data){
        if(strlen($data['phone']) <= 11)
        {
            $sqlUpdate = "UPDATE $this->table SET nome = :nome, cpf = :cpf, endereco = :endereco, bairro = :bairro,  cidade = :cidade, uf = :uf, cep = :cep, telefone = :telefone, email = :email  WHERE id = :id";       
            $resultQuery = $this->connection->prepare($sqlUpdate)->execute(['id'=>$data['id'],'nome'=>$data['nome'],'cpf'=>$data['cpf'],'endereco'=>$data['endereco'],'bairro'=>$data['bairro'],'cidade'=>$data['cidade'],'uf'=>$data['uf'], 'cep'=>$data['cep'],'telefone'=>$data['telefone'],'email'=>$data['email']]) ;
            return $this->verifyReturn($resultQuery);
        }
        return false;
    }

    public function delete($id){ 
        if(!$this->search($id))
        {
            return false;
        }
        $sqlDelete = "DELETE FROM $this->table WHERE id = :id";
        $resultQuery = $this->connection->prepare($sqlDelete)->execute(['id'=>$id]);
        return $this->verifyReturn($resultQuery);
    }

    public function verifyReturn($result){
        if($result == 1)
        {
            return true;
        }
        return false;
    }
}

?>
