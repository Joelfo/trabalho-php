<?php
namespace App\Controllers;
Use App\Core\BaseController;
Use App\Core\Funcoes;

class DashboardVendedor extends BaseController {
    public function __construct()
    {
        session_start();
        if(!(Funcoes::usuarioLogado() && Funcoes::usuarioVendedor())){
            Funcoes::redirecionar("Home");
        }

    }

    public function index(){
        $this->chamarView('DashboardVendedor/Index');
    }

}

?>