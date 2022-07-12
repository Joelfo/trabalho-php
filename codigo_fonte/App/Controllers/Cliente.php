<?php
namespace App\Controllers;
use App\Core\BaseController;
Use App\Core\Funcoes;
Use GUMP;
/*
CRUD DE CLIENTES
*/

class Cliente extends baseController{
    public function __construct(){
        session_start();
        if(!(Funcoes::usuarioLogado() && Funcoes::usuarioVendedor())){
            Funcoes::redirecionar("Home");
        }
    }
}

?>