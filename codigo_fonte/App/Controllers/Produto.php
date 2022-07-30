<?php
namespace App\Controllers;
use App\Core\BaseController;
Use App\Core\Funcoes;
Use GUMP;
Use Exception;
/*
CRUD DE PRODUTOS
*/

class Produto extends baseController{
    public function __construct(){
        session_start();
        if(!(Funcoes::usuarioLogado() && Funcoes::usuarioComprador())){
            Funcoes::redirecionar("Home");
        }
    }

    public function index(){
        $this->chamarView('Produto/Index', [], 'Produto/Produtojs');
    }

    public function ajax_lista(){
        $dados = array();
        try{
            $lista_produtos = $this->getDAO('Produto')->read();
            $corpo_tabela = "";
            if(!empty($lista_produtos)):
                foreach($lista_produtos as $produto){
                    $id_produto = $produto['id'];
                    $nome = $produto['nome_produto'];
                    $descricao = $produto['descricao'];
                    $preco_compra = $produto['preco_compra'];
                    $preco_venda = $produto['preco_venda'];
                    $quantidade_disponivel = $produto['quantidade_disponível'];
                    $liberado_venda = $produto['liberado_venda'];

                    $categoria = $this->getDAO('Categoria')->get($produto['id_categoria']);
                    $nome_categoria = $categoria['nome_categoria'];
                  
                    $corpo_tabela .= "<tr>";
                    $corpo_tabela .= "<td>" . $nome . "</td>";
                    $corpo_tabela .= "<td>" . $descricao . "</td>";
                    $corpo_tabela .= "<td>" . $preco_compra . "</td>";
                    $corpo_tabela .= "<td>" . $preco_venda . "</td>";
                    $corpo_tabela .= "<td>" . $quantidade_disponivel . "</td>";
                    $corpo_tabela .= "<td>" . $liberado_venda . "</td>";
                    $corpo_tabela .= "<td>" . $nome_categoria . "</td>";
                    $corpo_tabela .= "<td>";
                    $corpo_tabela .= "<button class=\"btn btn-outline-success\" id=\"btn-opcoes\" id-produto=\"" . $id_produto . "\" nome-produto=\"" . $nome . "\" >Opções</button>";
                    $corpo_tabela .= "</td>";
                    $corpo_tabela .= "</tr>";
                }
            else:
                $corpo_tabela = "<tr> Não há compras </tr>";
            endif;

            $dados['corpo_tabela'] = $corpo_tabela;
            $dados['status'] = true;
            echo json_encode($dados);
            exit();
        } catch(Exception $e){
            $dados['status'] = false;
            $dados['mensagem'] = $e->getMessage();
            echo json_encode($dados);
        }
    }

    public function enviaTokenCSRF(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') :
            $_SESSION['token_CSRF'] = Funcoes::gerarTokenCSRF();
            $dados = array();
            $dados['token_CSRF'] = $_SESSION['token_CSRF'];
            $dados['status'] = true;
            echo json_encode($dados);
            exit();
        else:
            Funcoes::redirecionar("Home");
        endif;
    }

    public function liberaVenda(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') :
            if($_POST['token-csrf'] == $_SESSION['token_CSRF']):
                $dados = array();
                try{
                    $this->getDAO('Produto')->liberaVenda($_POST['id-produto']);
                    $dados['status'] = true;
                } catch(Exception $e){
                    $dados['erro'] = $e->getMessage();
                    $dados['status'] = false;
                }
                echo json_encode($dados);
                exit();
            endif;
        endif;
    }

    public function bloqueiaVenda(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') :
            if($_POST['token-csrf'] == $_SESSION['token_CSRF']) :
                $dados = array();
                try{
                    $this->getDAO('Produto')->bloqueiaVenda($_POST['id-produto']);
                    $dados['status'] = true;
                } catch(Exception $e){
                    $dados['erro'] = $e->getMessage();
                    $dados['status'] = false;
                }
                echo json_encode($dados);
                exit();
            endif;
        endif;
    }
}

?>