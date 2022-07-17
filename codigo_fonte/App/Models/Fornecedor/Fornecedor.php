<?php
namespace App\Models\Fornecedor;

class Fornecedor {
    public function __construct($id = 0, $razao_social, $cnpj, $endereco, $bairro, $cidade, $uf, $cep, $telefone, $email){
        $this->id = $id;
        $this->razao_social = $razao_social;
        $this->cnpj = $cnpj;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->cep = $cep;
        $this->telefone = $telefone;
        $this->email = $email;
    }

    public function getId(){
        return $this->id;
    }

    public function getRazaoSocial(){
        return $this->razao_social;
    }

    public function getCnpj(){
        return $this->cnpj;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function getUf(){
        return $this->uf;
    }

    public function getCep(){
        return $this->cep;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setId($id){
        $this->id = $id;
    }
    
}

?>