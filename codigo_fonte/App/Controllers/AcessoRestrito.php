<?php 
namespace App\Controllers;
use App\Core\BaseController;
Use App\Core\Funcoes;
Use GUMP;

class AcessoRestrito extends baseController {
    protected $filtros = [
    'cpf' => 'trim|sanitize_string', 
    'senha' => 'trim|sanitize_string', 
    'captcha' => 'trim|sanitize_string'
    ];

    protected $regras = [
    'cpf' => 'required|exact_len,14', 
    'senha' => 'required|max_len,10', 
    'captcha' => 'required|captcha_valido'
    ];

    
    public function __construct(){
        session_start();
    }

    public function formLogin(){
        // gera o CAPTCHA_CODE e guarda na sessão 
        $_SESSION['Codigo_Captcha'] = Funcoes::gerarCodigoCaptcha();
        $imagem = Funcoes::gerarImgCaptcha($_SESSION['Codigo_Captcha']);
        // gera o CSRF_token e guarda na sessão
        $_SESSION['Token_CSRF'] = Funcoes::gerarTokenCSRF();
        $dados = ['imagem_captcha' => $imagem];
        $this->chamarView('AcessoRestrito/Login', $dados);
    }

    public function login(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"):
            GUMP::add_validator('captcha_valido', function($field, array $input, array $params, $value){
                return $input[$field] === $_SESSION['Codigo_Captcha'];
            }, 'Código captcha inválido.');
            $validador = new GUMP('pt-br');

            $post_filtrado = $validador->filter($_POST, $this->filtros);
            $post_validado = $validador->validate($post_filtrado, $this->regras);
            if($post_validado === true):
                if(Funcoes::validarTokenCSRF($post_filtrado['Token_CSRF'], $_SESSION['Token_CSRF']) === true):

                    $senhaEnviada = $_POST['senha']; 
                    $funcionarioDAO = AcessoRestrito::getDAO("FuncionarioDAO");
                    var_dump($_POST);
                    $senha_falsa = random_bytes(64);
                    $funcionario = $funcionarioDAO->getFuncionarioCPF($_POST["cpf"]);
                    if(empty($funcionario)):
                        $senha_a_comparar = $senha_falsa;
                    else:
                        $senha_a_comparar = $funcionario['senha'];
                    endif;
                    if($senha_a_comparar === $senhaEnviada):
                        session_regenerate_id(true);
                        $_SESSION['id'] = $funcionario['id'];
                        $_SESSION['nome_funcionario'] = $funcionario['nome'];
                        $_SESSION['cpf_funcionario'] = $funcionario['cpf'];
                        $_SESSION['papel_funcionario'] = $funcionario['papel'];
                        $rota = $this->retornaRotaPorPapel($_SESSION['papel_funcionario']);
                        Funcoes::redirecionar($rota);
                    endif;
                endif;
            else:
                var_dump()
                
            endif;
        endif;
     
    }

    private function retornaRotaPorPapel($papel){
        if ($papel == 2){
            return "Dashboard_Comprador";
        }
        if ($papel == 1){
            return "Dashboard_Vendedor";
        }
    }
}

?>