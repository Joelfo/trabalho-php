<?php
namespace App\Models\Fornecedor;

class Fornecedor {

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
    
    public function setRazaoSocial($razao_social){
        $this->razao_social = $razao_social;
    }

    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function setCep($cep){
        $this->cep = $cep;
    }

    public function setUf($uf){
        $this->uf = $uf;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setEmail($email){
        $this->email = $email;
    }
}

?>