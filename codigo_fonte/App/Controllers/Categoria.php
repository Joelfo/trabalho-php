<?php
namespace App\Controllers;
use App\Core\BaseController;
Use App\Core\Funcoes;
Use GUMP;
/*
CRUD DE CATEGORIAS
*/

class Categoria extends baseController{
    public function __construct(){
        session_start();
        if(!(Funcoes::usuarioLogado() && Funcoes::usuarioComprador())){
            Funcoes::redirecionar("Home");
        }
    }
}

?>