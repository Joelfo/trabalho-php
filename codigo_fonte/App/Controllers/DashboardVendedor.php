<?php
namespace App\Controllers;
Use App\Core\BaseController;
Use App\Core\Funcoes;

class DashboardVendedor extends BaseController {
    public function index(){
        $this->chamarView('DashboardVendedor/Index');
    }

}

?>