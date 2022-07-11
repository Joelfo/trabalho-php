<?php

namespace App\models;

class Artigo
{
    private $id, $nome, $email, $senha;

    public function __construct()
    {
        $this->id = 0;
        $this->titulo = "";
        $this->conteudo= "";
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    /******************* */

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /******************* */
    public function getConteudo()
    {
        return $this->conteudo;
    }

    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
    }

    
}
