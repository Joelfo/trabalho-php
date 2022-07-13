<?php
namespace App\Controllers;
use App\Core\BaseController;
Use App\Core\Funcoes;
Use GUMP;
/*
CRUD DE FORNECEDORES
*/

class Fornecedor extends baseController{
    public function __construct(){
        session_start();
        if(!(Funcoes::usuarioLogado() && Funcoes::usuarioVendedor())){
            Funcoes::redirecionar("Home");
        }
    }

    public function ajax_lista(){
        $lista_fornecedores = $this->getDAO('Fornecedor')->read();
        if(!empty($lista_fornecedores)){
            foreach($lista_fornecedores as $fornecedor){
                $corpo_tabela .= ""
            }
        }
    }
}

?>