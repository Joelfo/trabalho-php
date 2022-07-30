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
        $dados['funcionarios'] = $this->getDAO('Funcionario')->read();
        $this->chamarView('Compra/Index', $dados, 'Compra/Comprajs');
    }

     public function ajax_lista(){
        $dados = array();
        try{
            $lista_compras = $this->getDAO('Compra')->read();
            $corpo_tabela = "";
            if(!empty($lista_compras)):
                foreach($lista_compras as $compra){
                    $compra_id = htmlentities(utf8_encode($compra['id']));
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

    public function gravar_inclusao(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            if($_POST['token-csrf'] == $_SESSION['token_CSRF']):
                $compra = new \App\Models\Compra\Compra();
                $compra->setQuantidade_compra($_POST['quantidade-compra']);
                //A data da compra é calculada como a data no sistema no momento 
                $data_atual = date('Y-m-d');
                $compra->setData_compra($data_atual);
                
                $produto = $this->getDAO('Produto')->getProdutoNome($_POST['nome-produto']);
                $fornecedor = $this->getDAO('Fornecedor')->getFornecedorCnpj($_POST['cnpj-fornecedor']);
                $funcionario = $this->getDAO('Funcionario')->getFuncionarioCpf($_POST['cpf-funcionario']);

                $valor_compra = $_POST['quantidade-compra'] * $produto['preco_compra'];
                $compra->setValor_compra($valor_compra);

                $compra->setId_fornecedor($fornecedor['id']);
                $compra->setId_produto($produto['id']);
                $compra->setId_funcionario($funcionario['id']);

                $dados = array();
                try{
                    $compraDAO = $this->getDAO('Compra');
                    $compraDAO->create($compra);

                    $dados['status'] = true;
                    echo json_encode($dados);
                } catch(Exception $e){
                    $dados['status'] = false;
                    $dados['erro'] = $e->getMessage();
                    echo json_encode($dados);
                }
                
                exit();
            else:
                $dados['status'] = false;
                $dados['erro'] = 'Token CSRF invalido';
                echo json_encode($dados);
                exit();
            endif;
        endif;
    }

    
    public function atualizar($dados){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') :
            $_SESSION['token_CSRF'] = Funcoes::gerarTokenCSRF();
            //Token CSRF
            $dados['token_CSRF'] = $_SESSION['token_CSRF'];
            //Pegando dados do item que se deseja alterar
            try {
                $compraDAO = $this->getDAO('Compra');
                $compra = $compraDAO->get($dados['id']);
                $dados['quantidade_compra'] = htmlentities(utf8_encode($compra['quantidade_compra']));
                $dados['data_compra'] = htmlentities(utf8_encode($compra['data_compra']));
                $dados['valor_compra'] = htmlentities(utf8_encode($compra['valor_compra']));

                //Extraindo produto, fornecedor e funcionário do BD
                $fornecedor = $this->getDAO('Fornecedor')->get($compra['id_fornecedor']);
                $produto = $this->getDAO('Produto')->get($compra['id_produto']);
                $funcionario = $this->getDAO('Funcionario')->get($compra['id_funcionario']);

                //Preenchendo valores de cnpj(fornecedor), cpf(funcionario) e nome do produto
                $dados['cnpj_fornecedor'] = htmlentities(utf8_encode($fornecedor['cnpj']));
                $dados['nome_produto'] = htmlentities(utf8_encode($produto['nome_produto']));
                $dados['cpf_funcionario'] = htmlentities(utf8_encode($funcionario['cpf']));
                //Caso sucesso, retorna status true
                $dados['status'] = true;
            } catch(Exception $e){
                //Caso insucesso, retorna status false + causa do erro
                $dados['erro'] = $e->getMessage();
                $dados['status'] = false;
            }

            echo json_encode($dados);
            exit();
        else:
            Funcoes::redirecionar("Home");
        endif;
    }

    public function gravar_atualizacao(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            if($_POST['token-csrf'] == $_SESSION['token_CSRF']):
                //Instancia o objeto da classe Compra para fazer a atualização
                $compra = new \App\Models\Compra\Compra();
                $compra->setId($_POST['id-compra']);
                $compra->setQuantidade_compra($_POST['quantidade-compra']);
                $dados = array();
            
                //Recupera o produto, fornecedor e funcionario para fazer inserção do id
                $produto = $this->getDAO('Produto')->getProdutoNome($_POST['nome-produto']);
                $fornecedor = $this->getDAO('Fornecedor')->getFornecedorCnpj($_POST['cnpj-fornecedor']);
                $funcionario = $this->getDAO('Funcionario')->getFuncionarioCpf($_POST['cpf-funcionario']);
                //Calcula valor da compra
                $valor_compra = $_POST['quantidade-compra'] * $produto['preco_compra'];
                $compra->setValor_compra($valor_compra);

                $compra->setId_fornecedor($fornecedor['id']);
                $compra->setId_produto($produto['id']);
                $compra->setId_funcionario($funcionario['id']);
                try{
                    $compraDAO = $this->getDAO('Compra');
                    $compraDAO->update($compra);
                    $dados['status'] = true;
                    
                } catch(Exception $e){
                    $dados['status'] = false;
                    $dados['erro'] = $e->getMessage();
                    
                }
                
                //Retorna o JSON
                echo json_encode($dados);
                exit();
            else:
                $dados['status'] = false;
                $dados['erro'] = 'Token CSRF invalido';
                echo json_encode($dados);
                exit();
            endif;
        endif;
    }

    public function apagar($dados){
        if($_SERVER['REQUEST_METHOD'] == 'GET'):
            $id = $dados['id'];
            $compraDAO = $this->getDAO('Compra');
            try{
                $compraDAO->delete($id);
                $dados['status'] = true;
                echo json_encode($dados);
            } catch (Exception $e){
                $dados['status'] = false;
                $dados['erro'] = $e->getMessage();
                echo json_encode($dados);
            }
            exit();
        endif;
        
    }
    
}

?>