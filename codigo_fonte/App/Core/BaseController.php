<?php
namespace App\Core;
use App\Core\Funcoes;

class BaseController {
    public function chamarView($view, $dados=[], $js=null){
        //Perguntar pq no blog novo o professor começa o caminho com App
        require_once 'App/Views/Template.php';
    }

    /**
     * Retorna o objeto DAO(De acesso a dados) de um determinado model
     * @param String $model
     * Nome do model que você deseja retornar o DAO
     * @return $model
     * Objeto DAO a ser retornado.
     */
    public function getDAO($model) {
        $nomeArquivo = "App/Models/" . $model . "/" . $model . "DAO.php";
        //echo $nomeArquivo;
        if(file_exists($nomeArquivo)):
            require_once $nomeArquivo;
            $model = $model . "DAO";
            return new $model;
        else:
            echo "DAO não encontrado";
        endif; 
    }

}

?>