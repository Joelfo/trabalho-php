<?php

require_once "../Models/ClienteModel.php";




//"../Core/Funcoes.php";
//Use GUMP;


//include "../Models/Cliente/ClienteModel.php";

//Esta  classe nao esta funcionando
/*class Cliente extends baseController{
    public function __construct(){
        session_start();
        if(!(Funcoes::usuarioLogado() && Funcoes::usuarioVendedor())){
            Funcoes::redirecionar("Home");
        }
    }


    public function listarCliente(){
       $this->chamarView('DashboardClientes/cliente');
    }
 }*/


class ClienteController{

    private $model;

   /* public static function index(){
        include 'view/dashboardClietes/listarClientes.php' ;
     }*/

    function __construct(){
        $this->model = new ClienteModel;
    }

    public function getAll($data=null){
        $resultData = $this->model->getAll();
        $returnMessage = $data;
        require_once "../Views/DashboardClientes/index.php";
    }

    public function search($data,$view=null){
        $resultData = $this->model->search($data,$view);
        require_once "../views/DashboardClientes/$view.php";
    }

    public function goToNew(){
        include_once "../Views/DashboardClientes/editCreate.php";
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