<?php
namespace App\Core;
use App\Core\Funcoes;

class BaseController {
    public function chamarView($view, $dados=[], $js=null){
        //Perguntar pq no blog novo o professor começa o caminho com App
        require_once 'App/Views/Template.php';
    }

    public function getDAO($model) {
        $nomeArquivo = "App/Models/" . $model . "/" . $model . "DAO.php";
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