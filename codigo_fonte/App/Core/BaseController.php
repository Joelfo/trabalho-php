<?php
namespace App\Core;

class BaseController {
    function chamarView($view, $dados=[], $js=null){
        //Perguntar pq no blog novo o professor começa o caminho com App
        require_once 'App/Views/Template.php';
    }

    function getDAO($model) {
        $nomeArquivo = "App/Models/" . $model . ".php";
        if(file_exists($nomeArquivo)):
            require_once $nomeArquivo;
            return new $model;
        else:
            echo "DAO não encontrado";
        endif; 
    }
}

?>