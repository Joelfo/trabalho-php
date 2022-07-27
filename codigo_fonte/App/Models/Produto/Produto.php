<?php
namespace App\Models\Produto;

class Produto {
    private $id;
    private $nome_produto;
    private $descricao;
    private $preco_venda;
    private $quantidade__disponivel;
    private $liberado_venda;
    private $id_categoria;

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
     * Get the value of nome_produto
     */ 
    public function getNome_produto()
    {
        return $this->nome_produto;
    }

    /**
     * Set the value of nome_produto
     *
     * @return  self
     */ 
    public function setNome_produto($nome_produto)
    {
        $this->nome_produto = $nome_produto;

        return $this;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of preco_venda
     */ 
    public function getPreco_venda()
    {
        return $this->preco_venda;
    }

    /**
     * Set the value of preco_venda
     *
     * @return  self
     */ 
    public function setPreco_venda($preco_venda)
    {
        $this->preco_venda = $preco_venda;

        return $this;
    }

    /**
     * Get the value of quantidade__disponivel
     */ 
    public function getQuantidade__disponivel()
    {
        return $this->quantidade__disponivel;
    }

    /**
     * Set the value of quantidade__disponivel
     *
     * @return  self
     */ 
    public function setQuantidade__disponivel($quantidade__disponivel)
    {
        $this->quantidade__disponivel = $quantidade__disponivel;

        return $this;
    }

    /**
     * Get the value of liberado_venda
     */ 
    public function getLiberado_venda()
    {
        return $this->liberado_venda;
    }

    /**
     * Set the value of liberado_venda
     *
     * @return  self
     */ 
    public function setLiberado_venda($liberado_venda)
    {
        $this->liberado_venda = $liberado_venda;

        return $this;
    }

    /**
     * Get the value of id_categoria
     */ 
    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    /**
     * Set the value of id_categoria
     *
     * @return  self
     */ 
    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

        return $this;
    }
}


?>