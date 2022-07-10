<?php
class Funcionario{
    private $id, $nome, $cpf, $senha, $papel;

    public function __construct($id, $nome, $cpf, $senha, $papel)
    {
        $this->id = $this->setId($id);
        $this->nome = $this->setNome($nome);
        $this->cpf = $this->setCpf($cpf);
        $this->senha = $this->setSenha($senha);
        $this->papel = $this->setPapel($papel);
    }

    //Gets e Sets
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getSenha(){
        return $this->senha;
    }
    
    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getPapel(){
        return $this->papel;
    }

    public function setPapel($papel){
        $this->papel = $papel;
    }

}
?>