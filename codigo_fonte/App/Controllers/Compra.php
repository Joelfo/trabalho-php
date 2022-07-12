<?php
namespace App\Controllers;
use App\Core\BaseController;
Use App\Core\Funcoes;
Use GUMP;
/*
CRUD DE COMPRAS
*/

class Compra extends baseController{
    public function __construct(){
        session_start();
        if(!(Funcoes::usuarioLogado() && Funcoes::usuarioComprador())){
            Funcoes::redirecionar("Home");
        }
    }
}

?>