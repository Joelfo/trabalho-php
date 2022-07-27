<?php
namespace App\Controllers;
use App\Core\BaseController;
Use App\Core\Funcoes;
Use GUMP;
Use Exception;

/*
CRUD DE COMPRAS
*/

class Compra extends baseController{
    public function __construct(){
        session_start();
        if(!(Funcoes::usuarioLogado() && Funcoes::usuarioComprador())){
            Funcoes::redirecionar("Home");
        }
    }

    public function index(){
        $dados['fornecedores'] = $this->getDAO('Fornecedor')->read();
        $dados['produtos'] = $this->getDAO('Produto')->read();
        $dados['funcionarios'] = $this->getDAO('Funcionario')->readPorPapel(2);
        $this->chamarView('Compra/Index', $dados, 'Compra/Comprajs');
    }

     public function ajax_lista(){
        $dados = array();
        try{
            $lista_compras = $this->getDAO('Compra')->read();
            $corpo_tabela = "";
            if(!empty($lista_compras)):
                foreach($lista_compras as $compra){
                    $compra_id = htmlentities(utf8_encode($compra['data_compra']));
                    $quantidade_compra = htmlentities(utf8_encode($compra['quantidade_compra']));
                    $data_compra = htmlentities(utf8_encode($compra['data_compra']));
                    $valor_compra = htmlentities(utf8_encode($compra['valor_compra']));

                    $fornecedor = $this->getDAO('Fornecedor')->get($compra['id_fornecedor']);

                    $nome_fornecedor = htmlentities(utf8_encode($fornecedor['razao_social']));
                    $cnpj_fornecedor = htmlentities(utf8_encode($fornecedor['cnpj']));

                    $produto = $this->getDAO('Produto')->get($compra['id_produto']);

                    $nome_produto = htmlentities(utf8_encode($produto['nome_produto']));
                    $valor_unitario = htmlentities(utf8_encode($produto['preco_compra']));

                    $funcionario = $this->getDAO('Funcionario')->get($compra['id_funcionario']);

                    $nome_funcionario = htmlentities(utf8_encode($funcionario['nome']));
                    $cpf_funcionario = htmlentities(utf8_encode($funcionario['cpf']));
                    //var_dump($funcionario);
                    
                    //$fornecedor_nome = htmlentities(utf8_encode());
                    $corpo_tabela .= "<tr>";
                    $corpo_tabela .= "<td>" . $quantidade_compra . "</td>";
                    $corpo_tabela .= "<td>" . $data_compra . "</td>";
                    $corpo_tabela .= "<td>" . $valor_compra . "</td>";
                    $corpo_tabela .= "<td>" . $nome_fornecedor . "</td>";
                    $corpo_tabela .= "<td>" . $cnpj_fornecedor . "</td>";
                    $corpo_tabela .= "<td>" . $nome_produto . "</td>";
                    $corpo_tabela .= "<td>" . $valor_unitario . "</td>";
                    $corpo_tabela .= "<td>" . $nome_funcionario . "</td>";
                    $corpo_tabela .= "<td>" . $cpf_funcionario . "</td>";
                    $corpo_tabela .= "<td>";
                    $corpo_tabela .= "<button class=\"btn btn-outline-success\" id=\"btn-alterar\" id-compra=\"" . $compra_id . "\" data_compra=\"" . $data_compra ."\">Alterar</button>";
                    $corpo_tabela .= "<button class=\"btn btn-outline-danger\" id=\"btn-apagar\" id-compra=\"" . $compra_id . "\" data-compra=\"" . $data_compra ."\">Apagar</button>";
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

    public function incluir(){
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

    
}

?>