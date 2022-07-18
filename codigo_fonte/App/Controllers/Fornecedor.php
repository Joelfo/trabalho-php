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
        if(!(Funcoes::usuarioLogado() && Funcoes::usuarioComprador())){
            Funcoes::redirecionar("Home");
        }
    } 

    public function index(){
        $this->chamarView('Fornecedor/Index', $dados = [], $js = 'Fornecedor/Fornecedorjs');
        //$this->chamarView('Fornecedor/teste');
    }

    public function ajax_lista(){
        /* Estrutura da tabela
        <tr>
            <th>Razão Social</th>
            <th>Cnpj</th>
            <th>Endereço</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>CEP</th>
            <th>Telefone</th>
            <th>E-Mail</th>
        </tr>
    */
        $lista_fornecedores = $this->getDAO('Fornecedor')->read();
        $corpo_tabela = "";
        if(!empty($lista_fornecedores)):
            foreach($lista_fornecedores as $fornecedor){
                $corpo_tabela .= "<tr>";
                $corpo_tabela .= "<td>" . htmlentities(utf8_encode($fornecedor['razao_social'])) . "</td>";
                $corpo_tabela .= "<td>" . htmlentities(utf8_encode($fornecedor['cnpj'])) . "</td>";
                $corpo_tabela .= "<td>" . htmlentities(utf8_encode($fornecedor['endereco'])) . "</td>";
                $corpo_tabela .= "<td>" . htmlentities(utf8_encode($fornecedor['bairro'])) . "</td>";
                $corpo_tabela .= "<td>" . htmlentities(utf8_encode($fornecedor['cidade'])) . "</td>";
                $corpo_tabela .= "<td>" . htmlentities(utf8_encode($fornecedor['uf'])) . "</td>";
                $corpo_tabela .= "<td>" . htmlentities(utf8_encode($fornecedor['cep'])) . "</td>";
                $corpo_tabela .= "<td>" . htmlentities(utf8_encode($fornecedor['telefone'])) . "</td>";
                $corpo_tabela .= "<td>" . htmlentities(utf8_encode($fornecedor['email'])) . "</td>";
                $corpo_tabela .= "<td>";
                $corpo_tabela .= "<button class=\"btn btn-outline-success\" id=\"btn-alterar\" id-fornecedor=\"" . $fornecedor['id'] . "\" razao-social=\"" . $fornecedor['razao_social'] ."\">Alterar</button>";
                $corpo_tabela .= "<button class=\"btn btn-outline-danger\" id=\"btn-apagar\" id-fornecedor=\"" . $fornecedor['id'] . "\" razao-social=\"" . $fornecedor['razao_social'] ."\">Apagar</button>";
                $corpo_tabela .= "</td>";
                $corpo_tabela .= "<tr>";
            }
        else:
            $corpo_tabela .= "<tr>Não há fornecedores.</tr>";
        endif;

        $data['corpo_tabela'] = $corpo_tabela;
        $data['status'] = true;

        echo json_encode($data);
        exit();
        
    }

    public function incluir(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') :
            $_SESSION['Token_CSRF'] = Funcoes::gerarTokenCSRF();
            $dados = array();
            $dados['Token_CSRF'] = $_SESSION['Token_CSRF'];
            $dados['status'] = true;
            echo json_encode($dados);
            exit();
        else:
            Funcoes::redirecionar("Home");
        endif;
    }

    public function gravar_inclusao(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            if($_POST['token-csrf'] == $_SESSION['Token_CSRF']):
                
                $fornecedor = new \App\Models\Fornecedor\Fornecedor();
                
                $fornecedor->setRazaoSocial($_POST['razao-social']);
                $fornecedor->setCnpj($_POST['cnpj']);
                $fornecedor->setEndereco($_POST['endereco']);
                $fornecedor->setBairro($_POST['bairro']);
                $fornecedor->setCidade($_POST['cidade']);
                $fornecedor->setUf($_POST['uf']);
                $fornecedor->setCep($_POST['cep']);
                $fornecedor->setTelefone($_POST['telefone']);
                $fornecedor->setEmail($_POST['email']);
                
                $fornecedorDAO = $this->getDAO('Fornecedor');
                $result = $fornecedorDAO->create($fornecedor);

                $dados = array();
                $dados['status'] = true;
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

    public function atualizar($dados){
        $id = $dados['id-fornecedor'];
        $_SESSION['Token_CSRF'] = Funcoes::gerarTokenCSRF();
        $dados['Token_CSRF'] = $_SESSION['Token_CSRF'];
        $fornecedorDAO = $this->getDAO('Fornecedor');
        $fornecedor = $fornecedorDAO->get($id);
        //Os dados string como entrada do json_encode devem estar no formato UTF_8.
        $dados['id'] = utf8_encode($fornecedor['id']);
        $dados['razao_social'] = utf8_encode($fornecedor['razao_social']);
        $dados['cnpj'] = utf8_encode($fornecedor['cnpj']);
        $dados['endereco'] = utf8_encode($fornecedor['endereco']);
        $dados['bairro'] = utf8_encode($fornecedor['bairro']);
        $dados['cidade'] = utf8_encode($fornecedor['cidade']);
        $dados['uf'] = utf8_encode($fornecedor['uf']);
        $dados['cep'] = utf8_encode($fornecedor['cep']);
        $dados['telefone'] = utf8_encode($fornecedor['telefone']);
        $dados['email'] = utf8_encode($fornecedor['email']);
   
        //$dados['']  
        $dados['status'] = true;
        //var_dump($dados['Fornecedor']);
        //var_dump($dados);
        
        echo json_encode($dados);
        //echo "<h1> FLAG </h1>";
        //var_dump($dados['Fornecedor']);
        exit(); 
    }

    public function gravar_atualizacao(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') :
            /*$dados['status'] = true;
            echo json_encode($dados);
            exit();*/
            if($_POST['token-csrf'] == $_SESSION['Token_CSRF']):
                
                $fornecedor = new \App\Models\Fornecedor\Fornecedor();
                
                $fornecedor->setId($_POST['id-fornecedor']);
                
                $fornecedor->setRazaoSocial($_POST['razao-social']);
                $fornecedor->setCnpj($_POST['cnpj']);
                $fornecedor->setEndereco($_POST['endereco']);
                $fornecedor->setBairro($_POST['bairro']);
                $fornecedor->setCidade($_POST['cidade']);
                $fornecedor->setUf($_POST['uf']);
                $fornecedor->setCep($_POST['cep']);
                $fornecedor->setTelefone($_POST['telefone']);
                $fornecedor->setEmail($_POST['email']);
                
                $fornecedorDAO = $this->getDAO('Fornecedor');
                $fornecedorDAO->update($fornecedor);

                $dados['status'] = true;
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
            $id = $dados['id-fornecedor'];
            $fornecedorDAO = $this->getDAO("Fornecedor");
            $fornecedorDAO->delete($id);
            $dados = array();
            $dados['status'] = true;
            echo json_encode($dados);
            exit();
        endif;
    }
}

?>