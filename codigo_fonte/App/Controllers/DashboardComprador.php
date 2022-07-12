<?php
namespace App\Controllers;
Use App\Core\BaseController;
Use App\Core\Funcoes;

class DashboardComprador extends BaseController {
    public function __construct()
    {
        session_start();
        if(!(Funcoes::usuarioLogado() && Funcoes::usuarioComprador())){
            Funcoes::redirecionar("Home");
        }

    }

    public function index(){
        $this->chamarView('DashboardComprador/Index');
    }

}

?>