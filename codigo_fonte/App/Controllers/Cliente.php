<?php
namespace App\Controllers;
use App\Core\BaseController;
Use App\Core\Funcoes;

use App\Models\Cliente\ClientModel;

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


    public function listarCliente(){
       $this->chamarView('DashboardClientes/cliente');
    }
}


class ClientsController{

    private $model;

   /* public static function index(){
        include 'view/dashboardClietes/listarClientes.php' ;
     }*/

    function __construct(){
        $this->model = new ClientModel();
    }

    public function getAll($data=null){
        $resultData = $this->model->getAll();
        $returnMessage = $data;
        require_once "./views/dashboardCliente/index.php";
    }

    public function search($data,$view=null){
        $resultData = $this->model->search($data,$view);
        require_once "./views/dashboardCliente/$view.php";
    }

    public function goToNew(){
        require_once "./views/dashboardCliente/editCreate.php";
    }

    public function new($data){
        $result = $this->model->new($data);
        $this->redirectWithMessage('insert',$result);
    }

    public function edit($data){
        $result = $this->model->edit($data);
        $this->redirectWithMessage('edit',$result);
    }

    public function delete($id){
        $result = $this->model->delete($id);
        $this->redirectWithMessage('delete',$result);
    }

    public function redirectWithMessage($type,$result){
        header("Location: index.php?m=$type&a=showMessage&s=$result");
    }

    public function showMessage($success,$error,$status){
        if($status == 1)
        {
            $returnMessage = "Registro $success com sucesso!";
        }
        else
        {
            $returnMessage = "Erro ao $error!";
        }
        $this->getAll($returnMessage);
    }
}





?>