<?php
//Instanciação do Router
/* Quando tento usar a variável URL_Base como parâmetro do Router,
   recebo um warning */
$router = new \CoffeeCode\Router\Router('http://localhost/trabalho-php/codigo_fonte');
//Namespace
$router->namespace("App\Controllers");
//Rotas:

//Rotas GET:
//Página inicial(login)
$router->get("/", "AcessoRestrito:formLogin"); //http://localhost/trabalho-php/codigo_fonte/
$router->get("/Home", "AcessoRestrito:formLogin");

//LOGOUT
$router->get("/Logout", "AcessoRestrito:logOut");

//Dashboard de Vendedor
$router->get("/Dashboard_Vendedor", "DashboardVendedor:index");
$router->get("/Dashboard_Comprador", "DashboardComprador:index");
//Rotas POST:
$router->post("/logar", "AcessoRestrito:login");

//FORNECEDORES:
//Index do dashboard de fornecedores
$router->get("/Fornecedores", "Fornecedor:index");
//Método para listar fornecedores(Ler)
$router->get("/Fornecedores/Listar", "Fornecedor:ajax_lista");
//Incluir um novo fornecedor(Criar)
$router->get("/Fornecedores/Incluir", "Fornecedor:incluir");
//Gravar inclusão
$router->post("/Fornecedores/Incluir/Gravar", "Fornecedor:gravar_inclusao");
//Atualizar os dados de um fornecedor(Atualizar)
$router->get("/Fornecedores/Atualizar/{id-fornecedor}", "Fornecedor:atualizar");
//Gravar atualizações
$router->post("/Fornecedores/Atualizar/Gravar", 'Fornecedor:gravar_atualizacao');
//Apagar um fornecedor(Deletar)
$router->get("/Fornecedores/Apagar/{id-fornecedor}", "Fornecedor:apagar");

//Categorias
//Index do dashboard de categorias
$router->get("/Categorias", "Categoria:index");
//Listar Categorias(Ler)
$router->get("/Categorias/Listar", "Categoria:ajax_lista");
//Incluir uma nova categoria(Criar)
$router->get("/Categorias/Incluir", "Categoria:incluir");
//Salvar categoria a ser incluída
$router->post("/Categorias/Incluir/Salvar", "Categoria:gravar_inclusao");
//Atualizar os dados de uma categoria(Atualizar)
$router->get("/Categorias/Atualizar/{id-categoria}", "Categoria:atualizar");
//Salva a atualização em uma categoria
$router->post("/Categorias/Atualizar/Salvar", "Categoria:gravar_atualizacao");
//Apaga uma determinada categoria(Deletar)
$router->get("/Categorias/Apagar/{id-categoria}", "Categoria:apagar");

// DashboardClientes Cliente.php
$router->get("/Clientes", "Cliente:listarCliente");

// Solicitar um token CSRF para inclusão de usuário. Legal para utilizar com AJAX
//$router->get("/Fornecedores/Atualizar/{id}", "Fornecedor:atualizar");

/*if($router->error()){
    $router->redirect("/error/{router->error()}");
}

$router->get("/{errcode]", "Coffee:notFound");*/

$router->dispatch();

?>