<?php
namespace App\Models\Categoria;

class Categoria{
    private $id;
    private $nome_categoria;

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome_categoria
     */ 
    public function getNome_categoria()
    {
        return $this->nome_categoria;
    }

    /**
     * Set the value of nome_categoria
     *
     * @return  self
     */ 
    public function setNome_categoria($nome_categoria)
    {
        $this->nome_categoria = $nome_categoria;

        return $this;
    }
}

?>