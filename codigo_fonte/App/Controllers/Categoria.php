<?php
namespace App\Controllers;
use App\Core\BaseController;
Use App\Core\Funcoes;
use Exception;
Use GUMP;
use PDOException;

/*
CRUD DE CATEGORIAS
*/

class Categoria extends baseController{
    public function __construct(){
        session_start();
        if(!(Funcoes::usuarioLogado() && Funcoes::usuarioComprador())){
            Funcoes::redirecionar("Home");
        }
    }

    public function index(){
        $this->chamarView("Categoria/Index", [], 'Categoria/Categoriajs');
    }

    public function ajax_lista(){
        $dados = array();
        try{
            $lista_categorias = $this->getDAO('Categoria')->read();
            $corpo_tabela = "";
            if(!empty($lista_categorias)):
                foreach($lista_categorias as $categoria){
                    $categoria_nome = htmlentities(utf8_encode($categoria['nome_categoria']));
                    $categoria_id = htmlentities(utf8_encode($categoria['id']));
                    $corpo_tabela .= "<tr>";
                    $corpo_tabela .= "<td>" . $categoria_nome . "</td>";
                    $corpo_tabela .= "<td>";
                    $corpo_tabela .= "<button class=\"btn btn-outline-success\" id=\"btn-alterar\" id-categoria=\"" . $categoria_id . "\" nome-categoria=\"" . $categoria_nome ."\">Alterar</button>";
                    $corpo_tabela .= "<button class=\"btn btn-outline-danger\" id=\"btn-apagar\" id-categoria=\"" . $categoria_id . "\" nome-categoria=\"" . $categoria_nome ."\">Apagar</button>";
                    $corpo_tabela .= "</td>";
                    $corpo_tabela .= "</tr>";
                }
            else:
                $corpo_tabela = "<tr> Não há categorias </tr>";
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
                $categoria = new \App\Models\Categoria\Categoria();
                $categoria->setNome_categoria($_POST['nome-categoria']);
                $categoriaDAO = $this->getDAO('Categoria');
                try{
                    $categoriaDAO->create($categoria);
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
        $id = $dados['id-categoria'];
        $_SESSION['token_CSRF'] = Funcoes::gerarTokenCSRF();
        $dados['token_CSRF'] = $_SESSION['token_CSRF'];
        $categoriaDAO = $this->getDAO('Categoria');
        $categoria = $categoriaDAO->get($id);
        //Os dados string como entrada do json_encode devem estar no formato UTF_8.
        $dados['id'] = htmlentities(utf8_encode($categoria['id']));
        $dados['nome_categoria'] = htmlentities(utf8_encode($categoria['nome_categoria']));
        $dados['status'] = true;
        echo json_encode($dados);
        exit(); 
    }

    public function gravar_atualizacao(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            if($_POST['token-csrf'] == $_SESSION['token_CSRF']):
                $categoria = new \App\Models\Categoria\Categoria();
                $categoria->setNome_categoria($_POST['nome-categoria']);
                $categoria->setId($_POST['id-categoria']);
                $categoriaDAO = $this->getDAO('Categoria');
                try{
                    $categoriaDAO->update($categoria);
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

    public function apagar($dados){
        if($_SERVER['REQUEST_METHOD'] == 'GET'):
            $id = $dados['id-categoria'];
            $categoriaDAO = $this->getDAO('Categoria');
            try{
                $categoriaDAO->delete($id);
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