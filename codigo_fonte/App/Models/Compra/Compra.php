<?php
namespace App\Models\Compra;

class Compra{
    private $id;

    private $quantidade_compra;

    private $data_compra;

    private $valor_compra;

    private $id_fornecedor;

    private $id_produto;

    private $id_funcionario;
    



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
     * Get the value of quantidade_compra
     */ 
    public function getQuantidade_compra()
    {
        return $this->quantidade_compra;
    }

    /**
     * Set the value of quantidade_compra
     *
     * @return  self
     */ 
    public function setQuantidade_compra($quantidade_compra)
    {
        $this->quantidade_compra = $quantidade_compra;

        return $this;
    }

    /**
     * Get the value of data_compra
     */ 
    public function getData_compra()
    {
        return $this->data_compra;
    }

    /**
     * Set the value of data_compra
     *
     * @return  self
     */ 
    public function setData_compra($data_compra)
    {
        $this->data_compra = $data_compra;

        return $this;
    }

    /**
     * Get the value of valor_compra
     */ 
    public function getValor_compra()
    {
        return $this->valor_compra;
    }

    /**
     * Set the value of valor_compra
     *
     * @return  self
     */ 
    public function setValor_compra($valor_compra)
    {
        $this->valor_compra = $valor_compra;

        return $this;
    }



    /**
     * Get the value of id_fornecedor
     */ 
    public function getId_fornecedor()
    {
        return $this->id_fornecedor;
    }

    /**
     * Set the value of id_fornecedor
     *
     * @return  self
     */ 
    public function setId_fornecedor($id_fornecedor)
    {
        $this->id_fornecedor = $id_fornecedor;

        return $this;
    }

    /**
     * Get the value of id_produto
     */ 
    public function getId_produto()
    {
        return $this->id_produto;
    }

    /**
     * Set the value of id_produto
     *
     * @return  self
     */ 
    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;

        return $this;
    }

    /**
     * Get the value of id_funcionario
     */ 
    public function getId_funcionario()
    {
        return $this->id_funcionario;
    }

    /**
     * Set the value of id_funcionario
     *
     * @return  self
     */ 
    public function setId_funcionario($id_funcionario)
    {
        $this->id_funcionario = $id_funcionario;

        return $this;
    }
}

?>