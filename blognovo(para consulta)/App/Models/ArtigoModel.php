<?php

use App\Core\BaseModel;

class ArtigoModel extends BaseModel{

    public function create($artigo)
    {
        try { // conexão com a base de dados
            $sql = "INSERT INTO artigos(titulo,conteudo) VALUES (?,?)";
            $conn = ArtigoModel::getConexao();

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $artigo->getTitulo());
            $stmt->bindValue(2, $artigo->getConteudo());
            $stmt->execute();
            $conn = null;
        } catch (PDOException $e) {
            die('Query falhou: ' . $e->getMessage());
        }
    }

    public function get($id)
    {
        try {
            $sql = "SELECT * FROM artigos WHERE id = ?";
            $conn = ArtigoModel::getConexao();
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $conn = null;
            return  $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query falhou: ' . $e->getMessage());
        }
    }

    public function read()
    {
        try {
            $sql = "SELECT * FROM artigos";
            $conn = ArtigoModel::getConexao();
            $stmt = $conn->query($sql);
            $conn = null;
            return $stmt;
        } catch (\PDOException $e) {
            die('Query falhou: ' . $e->getMessage());
        }
    }

    public function update($artigo)
    {
        try {
            $sql = "UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?";
            $conn = ArtigoModel::getConexao();

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $artigo->getTitulo());
            $stmt->bindValue(2, $artigo->getConteudo());
            $stmt->execute();
            $conn = null;
        } catch (PDOException $e) {
            die('Query falhou: ' . $e->getMessage());
        }
    }

    public function delete($artigo)
    {
        try {
            $sql = "DELETE FROM artigos WHERE id = ?";
            $conn = ArtigoModel::getConexao();

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $artigo->getId());
            $stmt->execute();
            $conn = null;
        } catch (PDOException $e) {
            die('Query falhou: ' . $e->getMessage());
        }
    }


    public function getTotalArtigos()
    {
        try {
            $sql = "SELECT count(*) as total FROM artigos";
            $conn = ArtigoModel::getConexao();
            $stmt = $conn->query($sql)->fetch(\PDO::FETCH_ASSOC);
            $conn = null;
            return $stmt['total'];
        } catch (\PDOException $e) {
            die('Query falhou: ' . $e->getMessage());
        }
    }

    public function getRegistroPagina($offset, $numRegistrosPag)
    {
        try {
            $sql = "SELECT * FROM artigos LIMIT ?,?";
            $conn = ArtigoModel::getConexao();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $offset, PDO::PARAM_INT);
            $stmt->bindParam(2, $numRegistrosPag, PDO::PARAM_INT);
            $stmt->execute();
            //$stmt->debugDumpParams();  <- usando para depuração
            $conn = null;
            return $stmt;
        } catch (\PDOException $e) {
            die('Query falhou: ' . $e->getMessage());
        }
    }

    



}