<?php 
namespace App\Controllers;
use App\Core\BaseController;

class AcessoRestrito extends baseController {
    public function __construct(){
        session_start();
    }

    public function formLogin(){
        $this->chamarView('login');
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == "POST"):
            $senhaEnviada = $_POST['senha']; 
            $funcionarioDAO = AcessoRestrito::getDAO("FuncionarioDAO");
            var_dump($_POST);
            $senha_falsa = random_bytes(64);
            $funcionario = $funcionarioDAO->getFuncionarioCPF($_POST["cpf"]);
            if($funcionario->empty()):
                $senha_a_comparar = $senha_falsa;
            else:
                $senha_a_comparar = $funcionario['senha'];
            endif;
            if($senha_a_comparar == $senhaEnviada):
                session_regenerate_id(true);
                $_SESSION['id'] = $funcionario['id'];
                $_SESSION['nomeUsuario'] = $funcionario['senha'];
                $_SESSION['cpfUsuario'] = $funcionario['cpf'];
            endif;
        endif;
    }
}

?>