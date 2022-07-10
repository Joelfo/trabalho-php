<?php
namespace App\Core;

use \PDO;
use \PDOException;

class BaseDAO{
    public static function getConnection(){
        $dataBase = "mysql:host=" . HOST . ";dbname=" . DB;

        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        try{//Conexão com o BD
            return new PDO($dataBase, USER, PASSWORD, $options);
        } catch(PDOException $e){
            echo "Conexão ao BD falhou:" . $e->getMessage();
        }

    }
}
?>